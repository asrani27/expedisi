<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserControll extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        return view('user.index',compact('user'));
    }
     
    public function edit($id)
    {
       
        $user = User::find($id);
        $role = Role::all();
        return view('user.edit',compact('user','role'));
    }

     public function create()
    {
        $user = User::all();
        $role = Role::all();
        return view('user.create',compact('role','user'));
    }

    public function insert(Request $request)
    {
    	//dd($request->all());
        $user = new User;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->save();
        $role = $request->role_id;
        $user->attachRole($role);

        $user->save();

         return redirect('/user')->with('response','Berhasil Di Simpan');
    }
    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->save();
        $user->syncRoles([$request->input('role_id')]);


        $user->save();

         return redirect('/user')->with('response','Berhasil Di Update');
    }   
     public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

         return redirect('/user')->with('response','Berhasil Di Hapus');
    }
}
