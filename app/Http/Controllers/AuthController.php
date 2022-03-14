<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $remember = $request->remember ? true : false;

        // dd(Auth::attempt(['email' => $request->email, 'password' => ($request->password)],$remember));
        // dd(Auth::attempt(['email' => $request->email, 'password' => ($request->password)]));
        if (Auth::attempt(['email' => $request->email, 'password' => ($request->password)],$remember)) {
            $user = User::find(Auth::id());
            return redirect('/')->with('success', 'Anda berhasil login!');
        }

        // dd("gagal");
        return back()->with('error','Gagal login!!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success','Berhasil logout.');
    }
}
