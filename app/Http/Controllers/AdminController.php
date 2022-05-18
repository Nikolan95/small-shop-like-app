<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Requests\TopCategoryRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\UserResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index($status)
    {
        $products = Product::where('approve', $status)->with('category')->get();
        $categories = Category::tree()->get()->toTree();

        return view('admin.products', [
            'products' => $products,
            'categories' => $categories,
            'status' => $status
        ]);
    }

    public function approve(Request $request)
    {
        $product = Product::where('id', $request->input('id'))->firstOrFail();
        $product->approve = 'Approved';
        $product->update();
        return redirect()->back()->with('approved', 'approved');
    }

    public function deny(Request $request)
    {
        $product = Product::where('id', $request->input('id'))->firstOrFail();
        $product->approve = 'Denied';
        $product->update();
        return redirect()->back()->with('denied', 'denied');
    }

    public function customers()
    {
        $users = User::where('is_admin', false)->get();

        return view('admin.customers', [
            'users' => $users
        ]);
    }

    public function customerCreate(CreateCustomerRequest $request)
    {
        if($request->validator->fails()){
            return response()->json(['status' => 0, 'error' => $request->validator->errors()->toArray()]);
        }

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

        return new UserResource($user);
    }

    public function customerEdit($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    public function customerUpdate(UpdateCustomerRequest $request)
    {
        if($request->validator->fails()){
            return response()->json(['status' => 0, 'error' => $request->validator->errors()->toArray()]);
        }
        $user = User::findOrFail($request->input('userId'));
        $user->update($request->validated());
        $user->save();
        return new UserResource($user);
    }

    public function customerDelete($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return response()->json(['success' => 'User has been deleted']);
    }

    public function categories()
    {
        $categories = Category::tree()->get()->toTree();
        $allCategories = Category::all();

        return view('admin.categories', [
           'categories' => $categories,
            'allCategories' => $allCategories
        ]);
    }

    public function topCategoryCreate(TopCategoryRequest $request)
    {
        Category::create($request->validated());
        return Redirect::back()->with('success', 'success');
    }

    public function subCategoryCreate(SubCategoryRequest $request)
    {
        Category::create([
            'parent_id' => $request->input('category'),
            'name' => $request->input('newsubcategory')
        ]);
        return Redirect::back()->with('success', 'success');
    }
}
