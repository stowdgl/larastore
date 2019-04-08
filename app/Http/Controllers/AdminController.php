<?php

namespace App\Http\Controllers;
use App\Prices;
use App\Products;
use App\Categories;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        if (auth()->check())
        {
            if ((auth()->user()->user_type)=='admin'){
                $products= Products::with('categories','prices')->orderBy('created_at')->get();
                $categories = Categories::with('products')->orderBy('title')->get();
                return view('admin.dashboard',['categories'=>$categories]);
            }else{
                abort(404);

            }
        }else{
            abort(404);

        }

    }
    public function storeProd(Request $request){
        if (auth()->check())
        {
            if ((auth()->user()->user_type)=='admin'){
                $product = new Products;
                $product->title = $request['title'];
                $product->code = $request['code'];
                $product->specifications = $request['specifications'];
                $product->manufacturer = $request['manufacturer'];
                $product->manufacturer_img = '/img/'.$request['manufacturerimg'];
                $product->product_img = '/img/'.$request['productimg'];
                $product->items_available = $request['itemsavailable'];

                $product->save();
                $product->categories()->attach($request['categories'],['products_id'=>$product->id]);
                $price = new Prices;
                $price->price =  $request['price'];
                $price->product_id = $product->id;
                $price->save();
                $price->products()->attach($price->id,['products_id'=>$product->id]);

                return redirect('/dashboard');
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
    public function storeCat(Request $request){
        if (auth()->check())
        {
            if ((auth()->user()->user_type)=='admin'){
                $category = new Categories;
                $category->title = $request['title'];
                $category->parent_id = $request['parent_id'];
                $category->products()->attach($request['categories'],['products_id'=>$category->id]);
                $category->save();
                return redirect('/dashboard');
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
}
