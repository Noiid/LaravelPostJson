<?php

namespace App\Http\Controllers;

use App\User;
use App\UserLevel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        $usr_lvl = UserLevel::all();
        // dd($usr_lvl);

        return view('Users.index',['users' => $users, 'usr_lvl' => $usr_lvl]);
    }

    public function store(Request $request)
    {
        if($request->password!=$request->confirm_password){
            return back()->with('error','Password harus sama dengan Confirm Password');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'id_user_level' => $request->id_user_level,
            'password' => bcrypt($request->password)
        ]);

        return back()->with('success','Berhasil menyimpan data user baru!');
    }

    public function update(Request $request)
    {
        User::find($request->id)->update($request->all());

        return back()->with('success','Berhasil mengubah data user baru!');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return back()->with('success','Berhasil menghapus data user!');
    }
}
