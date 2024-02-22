<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPanelController extends Controller
{
    function show(){
        $user = auth()->user();
        return view('user-panel', [
            'user' => $user,
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
