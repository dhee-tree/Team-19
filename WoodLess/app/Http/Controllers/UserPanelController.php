<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class UserPanelController extends Controller
{
    function show(){
        $user = auth()->user();
        return view('user-panel', [
            'user' => $user,
            'similarProducts'=> Product::all(),
        ]);
    }

    function showDetails(){
        $user = auth()->user();
        return view('user-details', [
            'user' => $user,
        ]);
    }

    function update(Request $request){
        $user = auth()->user();
        $user->update($request->all());
        return redirect()->back()->with('success', 'Your details have been updated.');
    }
}
