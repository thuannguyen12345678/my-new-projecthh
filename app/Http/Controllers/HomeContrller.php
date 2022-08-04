<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeContrller extends Controller
{

    public function show_form_register(){
        return view('logins.register');
    }
    public function register(Request $request){
        
            $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login');
    }


    public function show_form_login(){
        if(Auth::check()){
            return redirect ('/tasks');
        }else{
            return view('logins.login');
        }
        
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)){
                return redirect ('/tasks');
            }
            return redirect('')->back();
    }



    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect()->route('login');
}
}
