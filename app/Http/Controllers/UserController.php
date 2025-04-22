<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(){
        return view("User.Register"); 
    } 
    public function signup(Request $request){
        $credentials =  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]); 
        $user = User::create($credentials);
        $role = Role::where('name', 'user')->first();
      if ($role) {
        $user->roles()->attach($role->id);
    }

 
        return redirect()->route('home')->with('success', 'Registration successful!');

    }
    public function login(){
        return view("User.login"); 
    } 
    public function sginIn(Request $request){
        $credentials =  $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]); 
        if (auth()->attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('home')->with('success', 'Logout successful!');
    }

}
