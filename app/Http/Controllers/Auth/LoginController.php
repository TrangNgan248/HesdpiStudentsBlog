<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('page.auth.login');
    }
    public function store(Request $request){
        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required',
        ]);

        if (Auth::attempt(['password' => $request->password,'username' => $request->username])) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'username' => 'Sai tên đăng nhập hoặc mật khẩu',
        ]);
    }
}
