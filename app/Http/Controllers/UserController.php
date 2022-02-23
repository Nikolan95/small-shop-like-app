<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // new doctor/user register view
    public function register(){

        return view('auth.register');

    }
    // login doctor/user view
    public function login(){

        return view('auth.login');

    }
    // login doctor function
    public function loginDoctor(Request $request)
    {
        $request->validate([
            'username' => 'required|min:4|max:100',
            'password' => 'required|min:6|',
         ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'login success');
        }

        return back()->with('error', 'Wrong username or password');
    }
    //logout doctor function
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'username' => 'required|min:4|max:100|unique:users',
            'firstname' => 'required|min:2|max:100',
            'lastname' => 'required|min:2|max:100',
            'email' => 'required|email|min:4|max:100|unique:users',
            'address' => 'required|min:2|max:100',
            'city' => 'required|min:2|max:100',
            'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:6',
         ]);

        $user = new User;

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->password = Hash::make($request->password);


        if($user->save()){
            Auth::loginUsingId($user->id);
            return redirect('/dashboard');
        }
    }
}
