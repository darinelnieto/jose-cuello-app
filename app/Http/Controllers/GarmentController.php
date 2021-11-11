<?php

namespace App\Http\Controllers;

use App\Models\garments;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use App\paginate;
use Illuminate\Support\Arr;

class GarmentController extends Controller
{
    public function index(Request $request){
        $user = User::find($request->id); 
        return view('prendas.index', compact('user'));
    }

    public function create(Request $request)
    {
        $register = new garments();
        $register->name = $request->name;
        $register->sku = $request->sku;
        $register->amount = $request->amount;

        $register->save();
        $register->users()->sync($request->user_id);
        return redirect()->back();
    }

    public function reports(){
        $users = User::whereHas("roles", function($q){ $q->where("name", "Operario"); })->get();
        return view('prendas.reports', compact('users'));
    }

    public function userReports(Request $request){
        $reports = User::find($request->id);
        return view('prendas.report-user', compact('reports'));
    }

}
