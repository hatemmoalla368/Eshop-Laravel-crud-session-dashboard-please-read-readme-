<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::all();
        return view("orders",compact("orders"));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate incoming request
    $request->validate([
        'validated' => 'required|in:oui,non', // Ensure validated field is either 'oui' or 'non'
    ]);

    // Find the order
    $order = Order::findOrFail($id);

    // Update the validated field
    $order->validated = $request->validated == 'oui' ? true : false;
    $order->save();

    // Redirect back or to any other route after update
    return redirect()->back()->with('success', 'Order updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
