<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class UserPanelController extends Controller
{
    function show(){
        $user = auth()->user();
        $recentOrder = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        return view('user-panel', [
            'user' => $user,
            'similarProducts'=> Product::all(),
            'recent'=> $recentOrder,
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
