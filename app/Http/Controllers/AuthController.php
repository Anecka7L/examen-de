<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister() { 
        return view('auth.register'); 
    }
    
    public function register(Request $req) {
        $req->validate([
            'login' => 'required|min:6|regex:/^[a-zA-Z0-9]+$/|unique:users',
            'password' => 'required|min:8',
            'full_name' => 'required|regex:/^[а-яА-Я\s]+$/u',
            'phone' => 'required|regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/',
            'email' => 'required|email|unique:users'
        ]);
        
        $user = User::create([
            'login' => $req->login,
            'password' => Hash::make($req->password),
            'full_name' => $req->full_name,
            'phone' => $req->phone,
            'email' => $req->email,
            'role' => 'user'
        ]);
        
        Auth::login($user);
        return redirect('/applications');
    }
    
    public function showLogin() { 
        return view('auth.login'); 
    }
    
    public function login(Request $req) {
        
        $user = User::where('login', $req->login)->first();
        
        if($user && Hash::check($req->password, $user->password)) {
            Auth::login($user);
            return redirect($user->role == 'admin' ? '/admin' : '/applications');
        }
        
        return back()->withErrors(['error' => 'Неверный логин или пароль']);
    }
    
    public function logout() { 
        Auth::logout(); 
        return redirect('/login'); 
    }
}