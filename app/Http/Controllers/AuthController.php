<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('layouts.guest.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === $password) {
            return redirect()->route('admin.menu.index')->with('success', 'Selamat Datang, ' . $username);
        }

        return back()->with('error', 'Username dan Password tidak sama!')->withInput();
    }
}
