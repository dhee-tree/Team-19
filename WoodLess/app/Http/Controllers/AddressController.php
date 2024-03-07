<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // Method to show a list of addresses and a form to add a new one
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $addresses = $user->addresses; // Get the addresses of the authenticated user
        return view('user-details', compact('addresses', 'user')); // Pass both addresses and user to the view
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

        return redirect()->route('user-details')->with('success', 'Address added successfully.');
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

        return redirect()->route('user-details')->with('success', 'Address updated successfully.');
    }

    // Method to delete an address
    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->route('user-details')->with('success', 'Address deleted successfully.');
    }

        public function setDefault(Address $address)
    {
        // Your logic to set the address as default.
        // This may involve setting a flag in the database and unsetting it for other addresses.

        return back()->with('success', 'Default address set successfully.');
    }

}