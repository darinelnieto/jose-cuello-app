<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\State;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use App\Models\file;
use App\paginate;
use Illuminate\Support\Arr;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $users = User::all();
        $states = State::all();
        return view('ordenes.index', compact('orders', 'users', 'states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $orden = new Order();
        $orden->name = $request->name;
        $orden->sku = $request->sku;
        $orden->quantity = $request->quantity;
        $orden->customer_name = $request->customer_name;
        $orden->deadline = $request->deadline;
        if($request->file('file')){
            $orden->file = $request->file('file')->store('order', 'public');
            $orden->save();
            $orden->states()->sync($request->id);
        }

        return redirect('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $order = Order::find($request->id);
        $order->states()->sync($request->state_id);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function assignOrder(Request $request)
    {
        $order = Order::find($request->id);
        $order->users()->sync($request->user_id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
