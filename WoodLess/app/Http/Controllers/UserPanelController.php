<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPanelController extends Controller
{
    function show(){
        return view('user-panel');
    }    
}
