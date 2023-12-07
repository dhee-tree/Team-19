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
}
