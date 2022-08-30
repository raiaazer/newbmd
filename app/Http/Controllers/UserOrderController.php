<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function checkout(){
        return view('theme.checkout');
    }
}
