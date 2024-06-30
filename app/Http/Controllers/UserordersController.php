<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderline;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserordersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset(Auth::user()->id)){
        $useroderids = Order::where('user_id', Auth::user()->id)->pluck('id');



        $orders = Orderline::whereIn('order_id',$useroderids)->get( );



        return view('userorders', compact('orders'));
    }
    else {
        return redirect()->back()->withErrors(['msg' => 'tu dois avoir un compte pour vois les liste des order']);
    }
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
