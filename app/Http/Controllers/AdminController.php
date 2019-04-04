<?php

namespace App\Http\Controllers;
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
                return redirect()->back();
            }
        }else{
            abort(404);
            return redirect()->back();
        }

    }
    public function store(Request $request){
        if (auth()->check())
        {
            if ((auth()->user()->user_type)=='admin'){
                $product = new Products;
                $product->title = $request['title'];
                $product->code = $request['code'];
                $product->specifications = $request['specifications'];
                $product->manufacturer = $request['manufacturer'];
                $product->manufacturer_img = $request['manufacturerimg'];
                $product->product_img = $request['productimg'];
                $product->items_available = $request['itemsavailable'];
                $product->categories()->attach($request['categories'],['products_id'=>$product->id]);
                $product->save();
                return view('admin.dashboard');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }
}
