<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Log;

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
        // Log that the function is being executed
        Log::info('ProductStore function called.');

        // Log the provided ID
        Log::info('Provided ID: ' . $id);

        // Log the form data
        Log::info('Form data:', $request->all());

        // Check if an ID is provided
        if ($id) {
            // Retrieve the product by ID
            $product = Product::find($id);

            // Check if the product exists
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }

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
            $product->attributes = json_encode($attributes);

            // Update the images (if any)
            $images = $request->file('images');
            if ($images) {
                $imagePaths = [];
                foreach ($images as $image) {
                    $path = $image->store('images');
                    $imagePaths[] = $path;
                }
                $product->images = implode(',', $imagePaths);
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
