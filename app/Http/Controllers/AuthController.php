<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return back()->with('success', 'Register Successfully');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        //dd($credentials);
        if(Auth::attempt($credentials)){
            return to_route('notes.index')->with('success', 'login successfully');
        } else{
            return back()->with('error', 'Email or Password incorrect');
        }
    }

    public function logOut()
    {
        //dd("hi");
        Auth::logout();
        //return view('auth.login');
        
        return redirect()->route('login');
    }
   
}
