<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    protected $reviews;

    public function UserInfo($id)
    {
        $user = User::findOrFail($id);

        return view('components.users-info', compact('user'));
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
    public function inventory()
    {

        $products = Product::latest()->get();

        $products = $products->sortBy('id');

        return view('inventory', ['products' => $products]);
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


        // Check if an ID is provided
        if ($id >= 0) {
            // Retrieve the product by ID
            $product = Product::find($id);

            // Check if the product exists
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }
            //dd($request->all());
            // Update the product fields
            $product->title = $request->input('title');
            $product->description = $request->input('description');
            $product->cost = $request->input('cost');
            $product->discount = $request->input('discount');
            $product->updated_at = now();
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

            $product->attributes = json_encode($attributes);

            // Get the pre-existing images from the request
            $preExistingImages = $request->input('pre_existing_images', []);
            
            if (empty($preExistingImages)) {
                $product->images = '';
                
            } else {
                // Get the current images of the product
                $currentImagesArray = explode(',', $product->images);



                // Iterate over the current images
                foreach ($currentImagesArray as $currentImage) {
                    // Check if the current image is not included in the pre-existing images sent in the request
                    if (!in_array('/storage/'  . $currentImage, $preExistingImages)) {
                        // Delete or remove the image
                        Storage::delete('images/products/' . $currentImage);

                        // Remove the image from the array
                        $currentImagesArray = array_diff($currentImagesArray, [$currentImage]);
                    }
                }

                // Convert the array back to a string
                $product->images = implode(',', $currentImagesArray);
            }
            


            // Retrieve the existing images from the product model


            // Check if product images is empty or not
            if (!empty($product->images)) {
                // If not empty, explode the images string
                $imagePaths = explode(',', $product->images);
            } else {
                // If empty, assign an empty array
                $imagePaths = [];
            }

            //adding new image to product
            $images = $request->file('images');
            if ($images) {
                foreach ($images as $image) {
                    // Generate a unique filename for each image
                    $imageName = md5(uniqid() . microtime()) . '.' . $image->getClientOriginalExtension();
                    //dd($imageName);
                    // Store the image in the specified directory
                    $path = Storage::putFileAs('public/images/products/' . $product->id, $image, $imageName);
                    //dd($path);
                    // Save the image path
                    $imagePaths[] = $path;
                }

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

            return redirect()->route('admin-panel.inventory')->with('success', 'Product ' . $product->id . ' updated successfully.');
        } else {
            // Create a new product instance
            $product = new Product();

            // Enter the product fields
            $product->title = $request->input('title');
            $product->description = $request->input('description');
            $product->cost = $request->input('cost');
            $product->discount = $request->input('discount');
            $product->updated_at = now();

            // Save the product first to get an ID
            $product->save();

            // Update the warehouse quantities
            $warehouseQuantities = $request->input('quantities', []);
            foreach ($warehouseQuantities as $warehouseId => $quantity) {
                $product->setStockAmount($warehouseId, $quantity);
            }

            // Enter the attributes
            $attributes = [];
            $attributeKeys = $request->input('attributes_keys', []);
            $attributeValues = $request->input('attributes_values', []);
            foreach ($attributeKeys as $index => $key) {
                if (!empty($key)) {
                    $attributes[$key] = $attributeValues[$index] ?? null;
                }
            }
            $product->attributes = json_encode($attributes);

            // Save the product's attributes
            $product->save();

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

            // Initialize an array to store the paths of all images
            $imagePaths = [];

            // Add new images to the product
            $images = $request->file('images');
            if ($images) {
                foreach ($images as $image) {
                    // Generate a unique filename for each image
                    $imageName = md5(uniqid() . microtime()) . '.' . $image->getClientOriginalExtension();
                    // Store the image in the specified directory
                    $path = $image->storeAs('images/products/' . $product->id, $imageName, 'public');
                    // Save the image path
                    $imagePaths[] = $path;
                }
            }

            // Save the merged image paths in the database
            $product->images = implode(',', $imagePaths);

            // Save the product with updated image paths
            $product->save();

            // Redirect or return a response
            return redirect()->route('admin-panel.inventory')->with('success', 'Product created successfully.');
        }
    }
}
