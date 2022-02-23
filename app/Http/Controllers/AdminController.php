<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        $subcategories = SubCategory::get();

        $products = Product::with('subCategory')->with('subCategory.category')->with('user')->get();

        return view('admin.dashboard')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('subcategories', $subcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'category' => 'required',
            'subcategory' => 'required',
            'name' => 'required|min:2|max:100',
            'description' => 'required|min:2|max:255',
            'price' => 'required'
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $values = [
                'user_id' => Auth::id(),
                'subcategory_id' => $request->subcategory,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price
            ];

            $query = DB::table('products')->insert($values);
            $queryId = DB::getPdo()->lastInsertId();
            if($query){
                $variable = Product::with('subCategory')->with('subCategory.category')->with('user')->where('id', $queryId)->get();
                return response()->json($variable);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $product = Product::with('subCategory')->with('subCategory.category')->with('user')->where('id', $id)->firstorfail();

        return response()->json($product);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'category' => 'required',
            'subcategory' => 'required',
            'name' => 'required|min:2|max:100',
            'description' => 'required|min:2|max:255',
            'price' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else {
            $values = [
                'id' => $request->id,
                'user_id' => $request->userid,
                'subcategory_id' => $request->subcategory,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price
            ];

            $query = DB::table('products')->where('id', $request->id)->update($values);
            if($query){
                $variable = Product::with('subCategory')->with('subCategory.category')->with('user')->where('id', $request->id)->get();
                return response()->json($variable);
            }
        }
    }


    public function destroy($id)
    {
        $product = Product::findorfail($id);
        $product->delete();
        return response()->json(['success'=>'Product has been deleted']);
    }
}
