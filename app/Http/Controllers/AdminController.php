<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // $lesson = Lesson::paginate(5);
        // $order = Order::paginate(5);
        return view("admin");
    }
}
