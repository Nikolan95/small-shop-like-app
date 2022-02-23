<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function allProducts($category)
    {
        if($category == 'all') {
            $products = Product::with('subCategory')->with('subCategory.category')->with('user')->get();

            $categories = Category::all();

            $subCategories = SubCategory::with('category')->get();

            return view('products.index')->with('products', $products)->with('categories', $categories)->with('subCategories', $subCategories);
        }
        elseif ($category = Category::where('name', $category)->first()){

            $products = Product::whereHas('subCategory' , function ($query) use($category) {
                return $query->where('category_id', '=', $category->id);
            })->with('subCategory')->with('subCategory.category')->with('user')->get();

            $categories = Category::all();

            $subCategories = SubCategory::where('category_id', $category->id)->with('category')->get();

            return view('products.categories')->with('products', $products)->with('category', $category)->with('categories', $categories)->with('subCategories', $subCategories);
        }
    }


    public function subcategoryProducts($category, $subcategory)
    {
        if($category = Category::where('name', $category)->first()){
            if($subcategory = SubCategory::where('name', $subcategory)->where('category_id', $category->id)->first()){
                $products = Product::where('subcategory_id', $subcategory->id)->with('user')->get();

                $categories = Category::all();

                $subCategories = SubCategory::where('category_id', $category->id)->with('category')->get();

                return view('products.subcategories')->with('products', $products)->with('category', $category)->with('subcategory', $subcategory)->with('categories', $categories)->with('subCategories', $subCategories);
            }
        }
    }

    public function productsByUser($user)
    {
        if($user = User::where('username', $user)->first()){

            $products = Product::where('user_id', $user->id)->with('subCategory')->with('subCategory.category')->with('user')->get();

            $categories = Category::all();

            $subCategories = SubCategory::with('category')->get();

            return view('products.user')->with('products', $products)->with('categories', $categories)->with('subCategories', $subCategories)->with('user', $user);
        }
    }

    public function search(Request $request)
    {
        if(isset($_GET['query'])){
            $searchText = $_GET['query'];

            $products = Product::where('name', 'LIKE', '%'. $searchText . '%')->orWhere('description', 'LIKE', '%'. $searchText . '%')->with('subCategory')->with('subCategory.category')->get();

            $categories = Category::all();

            $subCategories = SubCategory::with('category')->get();

            return view('products.index')->with('products', $products)->with('categories', $categories)->with('subCategories', $subCategories);
        }
    }

    public function productdetail($category, $subcategory, $product)
    {
        $product = Product::with('subCategory')->with('subCategory.category')->with('user')->where('name', $product)->firstorfail();

        $relatedProducts = Product::with('subCategory')->with('subCategory.category')->where('subcategory_id', $product->subCategory->id)->where('id', '!=', $product->id)->limit(3)->get();

        return view('products.detail')->with('product', $product)->with('relatedProducts', $relatedProducts);
    }

    // app dashboard
    public function index()
    {
        $user = Auth::user();

        $categories = Category::get();

        $subcategories = SubCategory::get();

        $products = Product::with('subCategory')->with('subCategory.category')->where('user_id', '=', auth()->user()->id)->get();

        return view('dashboard')
            ->with('user', $user)
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('subcategories', $subcategories);
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
                $variable = Product::with('subCategory')->with('subCategory.category')->where('id', $queryId)->get();
                return response()->json($variable);
            }
        }
    }


    public function edit($id)
    {
        $product = Product::with('subCategory')->with('subCategory.category')->where('id', $id)->firstorfail();

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
                'user_id' => Auth::id(),
                'subcategory_id' => $request->subcategory,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price
            ];

            $query = DB::table('products')->where('id', $request->id)->update($values);
            if($query){
                $variable = Product::with('subCategory')->with('subCategory.category')->where('id', $request->id)->get();
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
