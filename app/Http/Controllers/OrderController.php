<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showList()
    {
        return view('order.list');
    }

    public function showCheckout()
    {
        return view('order.checkout');
    }
    public function showThankyou()
    {
        return view('order.thankyou');
    }
}
