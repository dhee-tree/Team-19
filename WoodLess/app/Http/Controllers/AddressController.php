<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    // Method to show a list of addresses and a form to add a new one
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $addresses = $user->addresses; // Get the addresses of the authenticated user
        return view('user-addresses', compact('addresses', 'user')); // Pass both addresses and user to the view
    }

    // Method to store a new address
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'house_number' => 'required|max:255',
            'street_name' => 'required|max:255',
            'postcode' => 'required|max:255',
            'city' => 'required|max:255',
        ]);

        Auth::user()->addresses()->create($validatedData);

        return back()->with('success', 'Address added successfully.');
    }

    // Method to show the edit form for an address
    public function edit(Address $address)
    {
        return view('address.edit', compact('address'));
    }

    // Method to update an existing address
    public function update(Request $request, Address $address)
    {

        $validatedData = $request->validate([
            'house_number' => 'required|max:255',
            'street_name' => 'required|max:255',
            'postcode' => 'required|max:255',
            'city' => 'required|max:255',
        ]);

        $address->update($validatedData);

        return back()->with('success', 'Address updated successfully.');
    }

    // Method to delete an address
    public function destroy(Address $address)
    {
        $address->delete();

        return back()->with('success', 'Address deleted successfully.');
    }

    //Method to set default
    public function setDefault($addressId)
{
    // Start a database transaction
    DB::beginTransaction();

    try {
        // Reset any previous default
        Auth::user()->addresses()->update(['is_default' => false]);

        // Set the selected address as default
        $address = Auth::user()->addresses()->findOrFail($addressId);
        $address->is_default = true;
        $address->save();

        // Commit the transaction
        DB::commit();

        // Redirect back with success message
        return back()->with('success', 'Default address has been set.');
    } catch (\Exception $e) {
        // Rollback the transaction
        DB::rollBack();
        // Redirect back with error message
        return back()->with('error', 'Unable to set default address.');
    }
}



}

