<?php

namespace App\Http\Controllers\Dashboard\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ChangeStatusOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::get();
        return view('dashboard.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('dashboard.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChangeStatusOrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        return redirect()->route('orders.index')
                ->with('success', 'Order Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Order deleted successfully');
    }
}
