<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Support\Collection;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function products()
    {
        $categories = Category::tree()->get()->toTree();
        $products = Product::where('approve', 'Approved')->paginate(8);

        return view('products.index', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        if($request->validator->fails()){
            return response()->json(['status' => 0, 'error' => $request->validator->errors()->toArray()]);
        }

        $imagePath = null;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $image->storeAs('public/images/products/' . $folder, $name);
            $imagePath = 'storage/images/products/'.$folder.'/'.$name;
        }

        $product = Product::create([
            'category_id'   =>  (int)$request->input('category')[max(array_keys($request->input('category')))],
            'title'         =>  $request->input('title'),
            'description'   =>  $request->input('description'),
            'price'         =>  $request->input('price'),
            'phone'         =>  $request->input('phone'),
            'location'      =>  $request->input('location'),
            'status'        =>  $request->input('status'),
            'image'         =>  $imagePath
        ]);

        return new ProductResource($product);
    }

    public function product($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = $product->category->ancestorsAndSelf()->breadthFirst()->get();
        $relatedProducts = Product::where('category_id', $product->category_id)->limit(3)->get();

        return view('products.detail', [
            'product' => $product,
            'categories' => $categories,
            'relatedProducts' => $relatedProducts
        ]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request)
    {
        if($request->validator->fails()){
            return response()->json(['status' => 0, 'error' => $request->validator->errors()->toArray()]);
        }
        $product = Product::findOrFail($request->input('productId'));
        $product->update($request->validated());
        $product->save();

        return new ProductResource($product);

    }

    public function destroy($id)
    {
        $product = Product::findorfail($id);
        $product->delete();
        return response()->json(['success' => 'Product has been deleted']);
    }

    public function search()
    {
        if (isset($_GET['query'])) {
            $searchText = $_GET['query'];

            $products = Product::where('approve', 'Approved')->where('title', 'LIKE', '%' . $searchText . '%')->orWhere('description', 'LIKE', '%' . $searchText . '%')->paginate(8);

            $categories = Category::tree()->get()->toTree();

            return view('products.index')->with('products', $products)->with('categories', $categories);
        }
    }

    public function userProducts($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $products = Product::where('user_id', $user->id)->paginate(8);
        $categories = Category::tree()->get()->toTree();

        return view('products.index')->with('products', $products)->with('categories', $categories)->with('username', $username);
    }

    public function category($category)
    {
        $category = Category::where('name', $category)->with('products', function ($query){
            return $query->where('approve', 'Approved');
        })->firstOrFail();
        $products = (new Collection($category->products))->paginate(8);


        return view('products.filter', [
           'subcategories' => $category->children,
           'products' => $products,
            'currentFilter' => $category,
            'categories' => $category->ancestorsAndSelf()->breadthFirst()->get()
        ]);
    }

    public function categories($id)
    {
        $categories = Category::where('parent_id', $id)->get();

        return new JsonResponse($categories);
    }
}
