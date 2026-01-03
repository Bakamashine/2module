<?php

namespace App\Http\Controllers;

use App\Contracts\IImageService;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{

    public function __construct(
        protected IImageService $imageService
    ) {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("order.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->only([
            "title",
            "description",
            "duration",
            "price",
            "start",
            "end",
        ]));
        $order->image = $this->imageService->UploadImage($request, "image", "order");
        $order->save();
        return redirect()->route("order.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view("order.edit", ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        // $order->fill()
        if ($request->hasFile("image")) {
            $order->image = $this->imageService->UploadImage($request, "image", "order");
        }
        $order->fill($request->only([
            "title",
            "description",
            "duration",
            "price",
            "start",
            "end",
        ]));
        $order->save();
        return redirect()->route("order.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return back();
    }

    public function index()
    {
        return view("order.index", ['order' => Order::paginate(5)]);
    }
}
