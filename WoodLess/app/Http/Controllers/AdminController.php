<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Address;
use App\Models\Category;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    protected $reviews;

    public function UserInfo($id)
    {
        $user = User::findOrFail($id);

        return view('components.user-info', compact('user'));
    }

    public function UserEdit($id)
    {
        $user = User::findOrFail($id);

        return view('components.user-edit', compact('user'));
    }

    public function UserAdd()
    {

        return view('components.user-add');
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
        $user->is_admin = $request->has('is_admin'); // Convert checkbox value to boolean

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


    public function ProductInfo($id)
    {
        $product = Product::findOrFail($id);

        return view('components.products-info', compact('product'));
    }

    public function ProductEdit($id)
    {
        $product = Product::findOrFail($id);

        // Retrieve all categories
        $categories = Category::all();

        // Retrieve all categories
        $warehouses = Warehouse::all();
        return view('components.products-edit', [
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
        return view('components.products-add', [
            'warehouses' => $warehouses,
            'categories' => $categories,
        ]);
    }

    //returns the view for inventory on the admin controller.
    public function inventory(Request $request)
    {

        $selectedLength = $request->input('length', 1000); // Default to 50 if not provided

        $products = Product::latest()->get();

        $products = $products->sortBy('id');
        $products = Product::paginate($selectedLength)->withQueryString();


        return view('inventory', compact('products'));
    }

    public function users()
    {

        $users = User::latest()->get();

        $users = $users->sortBy('id');

        return view('users-admin', ['users' => $users]);
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
}
