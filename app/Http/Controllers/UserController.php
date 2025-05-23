<?php

namespace App\Http\Controllers;

use App\Mail\profileMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{ 
    public function index(){
        // dd($mailer->content());  
        Mail::to('exampl@exmao.com')->send(new profileMail());
        return view("Email");
    }
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

 
        return redirect()->route('login')->with('success', 'Registration successful!');

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
            return redirect()->route('ListeProducts')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('home')->with('success', 'Logout successful!');
    }

}
