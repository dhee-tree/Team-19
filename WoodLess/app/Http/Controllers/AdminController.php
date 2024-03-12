<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\ImportanceLevel;
use App\Models\Address;
use App\Models\Category;
use App\Models\OrderStatus;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    protected $reviews;

    #region Dashboard

    public function Dashboard()
    {

        $users = User::latest()->select('id', 'created_at')->get();
        $users = $users->sortBy('id');

        $orders = Order::latest()->get();
        $orderCount = $orders->count();
        $totalCost = 0;
        $productsData = [];

        $products = Product::latest()->get();
        $products = $products->sortBy('id');

        foreach ($products as $product) {
            $productId = $product->id;
            $createdAt = $product->created_at;


            // Initialize counters
            $totalQuantitySold = 0;
            $totalOrders = 0;

            // Loop through each order
            foreach ($orders as $order) {
                // Check if the order contains the current product
                if ($order->products->contains($product)) {
                    // Increment total orders
                    $totalOrders++;
                    // Add the quantity of this product in the current order to total quantity sold
                    $totalQuantitySold += $order->products->find($product->id)->pivot->amount;
                    $cost = $product->price * $totalQuantitySold;
                    $totalCost += $cost;
                }
            }


            // Get the discount for this product
            $discount = $product->discount;

            // Assemble the data for this product
            $productData = [
                'created_at' => $createdAt,
                'total_quantity_sold' => $totalQuantitySold,
                'total_orders' => $totalOrders,
                'discount' => $discount
            ];

            // Add the product data to the productsData array using the product ID as key
            $productsData[$productId] = $productData;
        }

        $products = $productsData;

        $ticketsData = [];

        $tickets = Ticket::latest()->get();

        foreach ($tickets as $ticket) {
            $ticketId = $ticket->id;
            $createdAt = $ticket->created_at;
            $adminId = $ticket->admin_id;
            $userId = $ticket->user_id;

            // Assemble the data for this ticket
            $ticketData = [
                'created_at' => $createdAt,
                'admin_id' => $adminId,
                'user_id' => $userId
            ];

            // Add the ticket data to the ticketsData array using the ticket ID as key
            $ticketsData[$ticketId] = $ticketData;
        }

        $tickets = $ticketsData;
        // In your controller
        return view('admin-panel')->with([
            'users' => $users,
            'products' => $products,
            'tickets' => $tickets,
            'totalCost' => $totalCost,
            'orderCount' => $orderCount,
        ]);
    }

    #endregion

    #region User

    public function users(Request $request)
    {
        $selectedLength = $request->input('length', 1000); // Default to 1000 if not provided

        $users = User::latest()->get();

        $users = $users->sortBy('id');
        $users = User::paginate($selectedLength)->withQueryString();

        return view('users-admin', compact('users'));
    }

    public function UserInfo($id)
    {
        $user = User::findOrFail($id);

        return view('components.admin-panel.user-info', compact('user'));
    }

    public function UserAdd()
    {

        return view('components.admin-panel.user-add');
    }

    public function UserDelete($id)
    {
        // Retrieve the product by ID
        $user = User::find($id);

        // Check if the product exists
        if (!$user) {
            return redirect()->back()->with('error', 'User account not found.');
        }

        // Delete the product
        $user->delete();

        return redirect()->route('admin-panel.users')->with('success', 'user ' . $id . ' deleted succesfully.');
    }

    public function UserStore(Request $request, $id)
    {
        // Checks if we need to make a new user or get an existing one
        if ($id >= 0) {
            $user = User::find($id);

            // Check if the user exists
            if (!$user) {
                return redirect()->back()->with('success', 'User not found.');
            }
        } else {
            // Create a new user instance
            $user = new User();
        }

        // Update user information
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        if ($request->has('is_admin')) {
            // If checked, set the access level to 3
            $user->access_level = 3;
        } else {
            $user->access_level = 1;
        }

        // Save or update the user
        $user->save();

        // Delete existing addresses and save new ones
        $user->addresses()->delete();
        if ($request->has('addresses')) {
            foreach ($request->input('addresses') as $addressData) {

                $address = new Address();
                $address->house_number = $addressData['house_number'];
                $address->street_name = $addressData['street_name'];
                $address->postcode = $addressData['postcode'];
                $address->city = $addressData['city'];
                $user->addresses()->save($address); // Save address for the user
            }
        }

        if ($id >= 0) {
            return redirect()->route('admin-panel.users')->with('success', 'User ' . $id . ' was edited successfully');
        } else {
            return redirect()->route('admin-panel.users')->with('success', 'User ' . $id . ' was created successfully');
        }
    }

    #endregion

    #region Products
    //returns the view for inventory on the admin controller.
    public function inventory(Request $request)
    {

        $selectedLength = $request->input('length', 1000); // Default to 50 if not provided

        $products = Product::latest()->get();

        $products = $products->sortBy('id');
        $products = Product::paginate($selectedLength)->withQueryString();


        return view('inventory', compact('products'));
    }

    public function ProductInfo($id)
    {
        $product = Product::findOrFail($id);

        return view('components.admin-panel.products-info', compact('product'));
    }

    public function ProductEdit($id)
    {
        $product = Product::findOrFail($id);

        // Retrieve all categories
        $categories = Category::all();

        // Retrieve all categories
        $warehouses = Warehouse::all();
        return view('components.admin-panel.products-edit', [
            'product' => $product,
            'warehouses' => $warehouses,
            'categories' => $categories,
        ]);
    }

    public function ProductAdd()
    {
        // Retrieve all categories
        $categories = Category::all();
        // Retrieve all categories
        $warehouses = Warehouse::all();
        return view('components.admin-panel.products-add', [
            'warehouses' => $warehouses,
            'categories' => $categories,
        ]);
    }

    public function ProductDelete($id)
    {
        // Retrieve the product by ID
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Delete the product
        $product->delete();

        return redirect()->route('admin-panel.inventory')->with('success', 'Product ' . $id . ' deleted succesfully.');
    }

    public function ProductStore(Request $request, $id)
    {

        //checks if we need to make a new product or get an old one
        if ($id >= 0) {
            $product = Product::find($id);

            // Check if the product exists
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }
        } else {
            // Create a new product instance
            $product = new Product();
        }

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->cost = $request->input('cost');
        $product->discount = $request->input('discount');
        $product->updated_at = now();
        // Save the product
        $product->save();

        // Update the warehouse quantities
        $warehouseQuantities = $request->input('quantities', []);
        foreach ($warehouseQuantities as $warehouseId => $quantity) {
            $product->setStockAmount($warehouseId, $quantity);
        }

        // Update the attributes
        $attributes = [];
        $attributeKeys = $request->input('attributes_keys', []);
        $attributeValues = $request->input('attributes_values', []);
        foreach ($attributeKeys as $index => $key) {
            if (!empty($key)) {
                $attributes[$key] = $attributeValues[$index] ?? null;
            }
        }

        //store attributes
        $product->attributes = json_encode($attributes);

        // Associate categories with the product
        $categories = $request->input('categories', []);

        // Check if categories are provided
        if (empty($categories)) {
            // If no categories are provided, use the default category
            $defaultCategory = Category::defaultCategory();
            if ($defaultCategory) {
                // Sync the default category with the product
                $product->categories()->sync([$defaultCategory->id]);
            } else {
                // Handle the case where the default category is not found
                // You can log an error, display a message, or take other actions
            }
        } else {
            // Sync the provided categories with the product
            $product->categories()->sync($categories);
        }
        //checks if its existing product or not
        if ($id >= 0) {
            // Get the pre-existing images from the request
            $preExistingImages = $request->input('pre_existing_images', []);

            //checks if array is empty to delete images if so.
            if (empty($preExistingImages)) {
                $product->images = '';

                // Empty the folder associated with the product that contains all the images
                $productImagesFolder = 'public/images/products/' . $product->id;
                Storage::deleteDirectory($productImagesFolder);
            } else {
                // Get the current images of the product
                $currentImagesArray = explode(',', $product->images);
                $preExistingImages = implode(',', $preExistingImages);


                foreach ($currentImagesArray as $currentImage) {
                    //checks if this is the placeholder image
                    //dd($currentImage);
                    if ($currentImage != "https://placehold.co/600x400/png") {
                        // Extract the file name from the path
                        $currentFileName = pathinfo($currentImage, PATHINFO_BASENAME);

                        // Check if the current file name is not included in the pre-existing images' file names


                        if (strpos($preExistingImages, $currentFileName) === false) {
                            // Delete or remove the image
                            $path = Storage::delete($currentImage);
                            // Remove the image from the array
                            $currentImagesArray = array_diff($currentImagesArray, [$currentImage]);
                        }
                    }
                }
                // Convert the array back to a string
                //  1 => "/storage/public/images/products/10/95d642e9751caf33e6a622cc45fba2aa.png"
                //  0 => "/storage/images/products/10/95d642e9751caf33e6a622cc45fba2aa.png"


                $product->images = implode(',', $currentImagesArray);
                //dd($currentImagesArray);
            }
        }

        // Check if product images is empty or not, if the array also contains placeholder, we overwrite it since we dont want it there.
        if ($product->images == null || $product->images == "https://placehold.co/600x400/png") {
            // If empty, assign an empty array
            $imagePaths = [];
        } else {
            // If not empty, explode the images string
            $imagePaths = explode(',', $product->images);
        }

        //adding new image to product
        $images = $request->file('images');
        if ($images) {
            foreach ($images as $image) {
                // Generate a unique filename for each image
                $imageName = substr(md5(uniqid() . microtime()), 0, 5) .  '.' . $image->getClientOriginalExtension();
                //dd($imageName);
                // Store the image in the specified directory
                $path = Storage::putFileAs('public/images/products/' . $product->id, $image, $imageName);
                //dd($imagePaths);
                //dd($path);
                // Save the image path
                $imagePaths[] = $path;
                //dd($imagePaths);
            }

            //"public/images/products/1/a304ab50b085900a2e51cbfd8f44a8a8.png" // app\Http\Controllers\AdminController.php:205
            //"/storage/images/products/1/34aa6096d7e9c519b3dc4f6fb80ec9c0.png" // app\Http\Controllers\AdminController.php:205

            // Save the image paths in the database
            $product->images = implode(',', $imagePaths);
            //dd($product->images);
        }

        // Check if product images is empty or not
        if (!empty($imagePaths)) {
            // If not empty, explode the images string
            $product->images = implode(',', $imagePaths);
        } else {
            // If empty, assign an empty array
            $product->images = "https://placehold.co/600x400/png";
        }


        // Save the merged image paths in the database



        // Save the updated product
        $product->save();

        if ($id >= 0) {
            return redirect()->route('admin-panel.inventory')->with('success', 'Product ' . $product->id . ' updated successfully.');
        } else {
            return redirect()->route('admin-panel.inventory')->with('success', 'Product ' . $product->id . ' created successfully.');
        }
    }

    #endregion

    #region Tickets

    public function tickets(Request $request)
    {
        $selectedLength = $request->input('length', 100); // Default to 50 if not provided
        $queryFilter = $request->input('filter', 'all');

        // Retrieve tickets with pagination
        $tickets = Ticket::latest()->filter($queryFilter)->orderBy('id', 'desc')->paginate($selectedLength)->withQueryString();

        // Count total number of tickets
        $countTickets = Ticket::latest()->get();

        return view('tickets-admin', compact('tickets', 'countTickets'));
    }


    public function TicketClaim(Request $request, $ticketId)
    {
        // Get the authenticated user
        $admin = auth()->user();
        //get ticket
        $ticket = Ticket::findOrFail($ticketId);

        // Set the admin_id of the ticket to the ID of the authenticated user
        $ticket->admin_id = $admin->id;

        // Save the changes to the ticket
        $ticket->save();

        return redirect()->route('admin-panel.tickets')->with('success', 'Successfully claimed ticket ' . $ticketId);
    }

    public function TicketInfo($id)
    {
        $ticket = Ticket::findOrFail($id);

        // Retrieve importance levels
        $importance_levels = ImportanceLevel::latest()->get();

        return  view('components.admin-panel.ticket-info', compact('ticket', 'importance_levels'));
    }

    public function TicketDelete($id)
    {
        // Retrieve the product by ID
        $ticket = Ticket::find($id);

        // Check if the product exists
        if (!$ticket) {
            return redirect()->back()->with('error', 'ticket with ID:' . $id . ' not found.');
        }

        // Delete the product
        $ticket->delete();

        return redirect()->route('admin-panel.tickets')->with('success', 'ticket with ID:' . $id . ' deleted succesfully.');
    }

    public function TicketResolve($id)
    {
        // Retrieve the product by ID
        $ticket = Ticket::find($id);

        // Check if the product exists
        if (!$ticket) {
            return redirect()->back()->with('error', 'ticket with ' . $id . ' not found.');
        }

        $ticket->status++;
        $ticket->save();

        return redirect()->route('admin-panel.tickets')->with('success', 'ticket with ID:' . $id . ' resolved! JK WORKING ON IT LOLLOLAOFDLAWOFKJAWOFJAWOIFJAWOIFA');
    }
    public function TicketImportance($id, $importance)
    {
        // Retrieve the ticket by ID
        $ticket = Ticket::find($id);

        // Check if the ticket exists
        if (!$ticket) {
            return response()->json(['error' => 'Ticket with ID ' . $id . ' not found.'], 404);
        }

        // Update the importance level
        $ticket->importance_level_id = $importance;
        $ticket->save();

        // Return the updated ticket with the new importance level
        return response()->json(['level' => $ticket->importanceLevel->level]);
    }
    #endregion

    #region Orders


    public function orders(Request $request)
    {
        $selectedLength = $request->input('length', 1000); // Default to 1000 if not provided

        $orders = Order::latest()->get();

        $orders = $orders->sortBy('id');
        $orders = Order::paginate($selectedLength)->withQueryString();


        return view('orders-admin', compact('orders'));
    }


    public function OrderInfo($id)
    {
        $order = Order::findOrFail($id);
        // Retrieve all order statuses
        $order_status = OrderStatus::all();

        return view('components.admin-panel.order-info', compact('order', 'order_status'));
    }

    public function OrderDetails(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        // Get the details from the request
        $details = $request->input('details');

        // Update the order details
        $order->details = $details;

        // Save the changes
        $order->save();

        return redirect()->route('admin-panel-orders')->with('success', 'Successfully changed details for order: ' . $id);
    }



    #endregion


    #region Warehouses/Categories

    public function misc()
    {
        $warehouses = Warehouse::latest()->get()->sortBy('id');
        $categories = Category::latest()->get()->sortBy('id');


        return view('warehouse-admin', compact('categories', 'warehouses'));
    }

    public function CategoryInfo($id)
    {
        $category = Category::findOrFail($id);

        return view('components.admin-panel.category-info', compact('category'));
    }

    public function WarehouseInfo($id)
    {
        $warehouse = Warehouse::findOrFail($id);

        return view('components.admin-panel.warehouse-info', compact('warehouse'));
    }

    public function CategoryCreate(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'category' => 'required|string|max:60',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the maximum file size as needed
        ]);

        // Handle file upload
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '.' . $image->extension(); // Generate a unique image name
            $image->move(public_path('images/categories'), $imageName); // Move the uploaded image to the public/images directory
        } else {
            // Handle file upload error
            return redirect()->back()->with('error', 'Failed to upload image.');
        }

        // Create a new category instance
        $category = new Category();

        // Fill in the category details
        $category->category = $validatedData['category'];
        $category->images = $imageName; // Save the image file name

        // Save the category to the database
        $category->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Created Category with id: ' . $category->id . ' succesfully.');
    }

    public function WarehouseCreate(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'postcode' => 'required|string|max:255',
            'city' => 'required|string|max:60',
        ]);

        // Create a new warehouse instance
        $warehouse = new Warehouse();

        // Fill in the warehouse details
        $warehouse->address = $validatedData['address'];
        $warehouse->address_2 = $validatedData['address_2'];
        $warehouse->postcode = $validatedData['postcode'];
        $warehouse->city = $validatedData['city'];

        // Save the warehouse to the database
        $warehouse->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Created Warehouse with id: ' . $warehouse->id . ' succesfully.');
    }

    public function CategoryDelete($id)
    {
        $category = Category::findOrFail($id);

        // Check if the product exists
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        // Delete the product
        $category->delete();

        return redirect()->back()->with('success', 'Deleted Category ' . $id . ' succesfully.');
    }

    public function WarehouseDelete($id)
    {
        $warehouse = Warehouse::findOrFail($id);

        // Check if the product exists
        if (!$warehouse) {
            return redirect()->back()->with('error', 'Warehouse not found.');
        }

        // Delete the product
        $warehouse->delete();


        return redirect()->back()->with('success', 'Deleted Warehouse ' . $id . ' succesfully.');
    }

    #endregion User

}
