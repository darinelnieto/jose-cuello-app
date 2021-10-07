<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('/users/index', compact('usuarios'));
    }

    public function viewCreateUsers()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surnames' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->surnames = $request->surnames;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->state = 'Activo';
        $user->password = Hash::make($request->password);

        $user->save();
        $user->roles()->sync($request->roles);

        return redirect('/users/index')->with('mensajeExito', 'El usuario se creo con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        $roles = Role::all();
        $userRole = DB::table("model_has_roles")->where("model_has_roles.model_id",$request->id)
        ->pluck('model_has_roles.role_id','model_has_roles.role_id')
        ->all();
    
        return view('users.edit',compact('user','roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $user = User::find($request->id);
        if($request->password !== null){
            $user->name = $request->name;
            $user->surnames = $request->surnames;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
        }
        $user->name = $request->name;
        $user->surnames = $request->surnames;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        DB::table('model_has_roles')->where('model_id',$request->id)->delete();

        $user->assignRole($request->input('role'));
        return redirect('/users/index')->with('mensajeExito', 'El usuario se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
