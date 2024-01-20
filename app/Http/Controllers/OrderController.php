<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showList()
    {
        return view('order.list', [
            'user' => auth()->user(),
        ]);
    }

    public function showCheckout()
    {
        return view('order.checkout');
    }
    public function showThankyou(Request $request)
    {
        return view('order.thankyou')->with('params', $request->query());
    }
}
