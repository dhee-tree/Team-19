<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'warehouse_quantities' => 'array', // adjust validation rules as per your needs
            'attributes_keys' => 'array',
            'attributes_values' => 'array',
            'images.*' => 'image|max:2048', // adjust max file size as per your needs
        ]);


        // If ID is provided, update the existing product
        if ($id) {
            $product = Product::findOrFail($id);
            $product->update($request->all());
            // You can add more specific updating logic here if needed
        } else {
            // If no ID is provided, create a new product
            $product = new Product();
            $product->fill($request->all());
            $product->save();
        }
        // Process the form data and save to the database, etc.

        // For demonstration, you can access the data like this:
        $title = $request->input('title');
        $description = $request->input('description');
        $warehouseQuantities = $request->input('warehouse_quantities');
        $attributesKeys = $request->input('attributes_keys');
        $attributesValues = $request->input('attributes_values');
        $images = $request->file('images');

        // Loop through the images and store/upload them as needed
        if ($request->hasFile('images')) {
            foreach ($images as $image) {
                // Store or process the image
                $image->store('images');
            }
        }

        // Redirect back with a success message, or any other response
        return redirect()->back()->with('success', 'Product created successfully!');
    }
}
