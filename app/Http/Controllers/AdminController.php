<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $order = Order::paginate(5);
        return view("admin", ['order'=>$order]);
    }
}
