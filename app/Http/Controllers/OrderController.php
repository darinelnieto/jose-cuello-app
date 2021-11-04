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
        $orders = Order::paginate(8);
        $users = User::whereHas("roles", function($q){ $q->where("name", "Operario"); })->get();
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

    public function edit(Request $request)
    {
        $order = Order::find($request->id);
        $order->states()->sync($request->state_id);
        return redirect()->back();
    }

    public function assignOrder(Request $request)
    {
        $order = Order::find($request->id);
        $order->users()->sync($request->user_id);
        return redirect()->back();
    }

   public function viewOrder(Request $request){
        $view = Order::find($request->id);
        return view('ordenes.view-order', compact('view'));
   }
   
   public function search(Request $request){
        $orders = Order::where('deadline', '=', $request->deadline)->paginate(8);
        $users = User::all();
        $states = State::all();
        return view('ordenes.index', compact('orders', 'users', 'states'));
   }
}
