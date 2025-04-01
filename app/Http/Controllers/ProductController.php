<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class ProductController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('products.index', compact('orders'));
    }
}
