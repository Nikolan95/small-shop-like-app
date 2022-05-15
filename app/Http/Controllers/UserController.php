<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register(){

        return view('auth.register');

    }
    public function login(){

        return view('auth.login');

    }
    public function loginUser(LoginUserRequest $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->is_admin){
                return redirect()->route('admin.products', 'in process')->with('success', 'login success');
            }
            return redirect()->route('products')->with('success', 'login success');
        }
        return back()->with('error', 'Wrong credentials');
    }
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RegisterUserRequest  $request
     */
    public function store(RegisterUserRequest $request)
    {

        $user = User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }
    public function dashboard()
    {
        $products = Product::where('user_id', Auth::id())->with('category')->get();
        $categories = Category::tree()->get()->toTree();

        return view('products.dashboard', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
