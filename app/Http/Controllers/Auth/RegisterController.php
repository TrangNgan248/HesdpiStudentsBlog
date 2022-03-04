<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('page.auth.register');
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        //store user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '1',
        ]);
        //sign the user in
        auth()->attempt($request->only('username','password'));
        //redirect
        return redirect()->route('login');
    }
}
