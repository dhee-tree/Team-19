<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    protected $reviews;

    public function ProductInfo($id)
    {
        $product = Product::findOrFail($id);

        return view('components.products-info', compact('product'));
    }

    public function ProductEdit($id)
    {
        $product = Product::findOrFail($id);

        return view('components.products-edit', compact('product'));
    }

    //returns the view for inventory on the admin controller.
    public function inventory()
    {

        $products = Product::latest()->get();

        $products = $products->sortBy('id');

        return view('inventory', ['products' => $products]);
    }

    public function ProductStore(Request $request, $id)
    {


        // Check if an ID is provided
        if ($id) {
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
            $warehouseQuantities = $request->input('warehouse_quantities', []);
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
            //dd($product->images);

            $product->attributes = json_encode($attributes);

            // Get the pre-existing images from the request
            $preExistingImages = $request->input('pre_existing_images', []);

            // Get the current images of the product
            $currentImagesArray = explode(',', $product->images);

            // Iterate over the current images
            foreach ($currentImagesArray as $currentImage) {
                // Check if the current image is not included in the pre-existing images sent in the request
                if (!in_array($currentImage, $preExistingImages)) {
                    // Delete or remove the image
                    Storage::delete('images/products/' . $currentImage);

                    // Remove the image from the product model
                    $product->images = array_diff(explode(',', $product->images), [$currentImage]);
                }
            }
            //dd($product->images);
            $images = $request->file('images');
            //dd($currentImages);
            if ($images) {
                foreach ($images as $image) {
                    // Generate a unique filename for each image
                    $imageName = uniqid() . '_' . $image->getClientOriginalName();
                    //dd($imageName);
                    // Store the image in the specified directory
                    $path = $image->storeAs('images/products/' . $product->id, $imageName, 'public');
                    //dd($path);
                    // Save the image path
                    $imagePaths[] = $path;
                }

                // Save the image paths in the database
                $product->images = implode(',', $imagePaths);
                //dd($product->images);
            }
            // Save the updated product
            $product->save();

            return redirect()->route('admin-panel.inventory')->with('success', 'Product updated successfully.');
        } else {
            // Create a new product instance
            $product = new Product();

            // Fill the product attributes
            $product->fill($request->all());

            // Save the product
            $product->save();

            // Redirect or return a response
            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        }
    }
}
