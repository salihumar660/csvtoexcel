<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authenticationController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if(Auth::attempt($request->only('email' , 'password'))){
             return redirect()->intended('dashboard')->with('welcome_message', 'Welcome To Your Dashboard '. Auth::user()->name . '!');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match any records.'
        ]);
    }
    public function regForm(){
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:4|string|confirmed'
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);
        return redirect()->intended('/dashboard')->with('welcome_message', 'Welcome ' . $user->name . '!');
    }
    public function dashboard(){
        return view('dashboard');
    }
}
