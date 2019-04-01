<?php

namespace App\Http\Controllers;
use App\Products;
use App\Categories;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index(Request $request){
        $cart = $request->session()->get('cart');

        $products1 = [];
        if (isset($cart)) {
            foreach ($cart as $item) {
                $products1[] = Products::with('categories', 'prices')->where('id', $item)->get();
            }
        }
        $prodcount= count($products1);
        $products = Products::with('categories')->where('manufacturer',$request['manufacturer'])->get();
        $prod = Products::with('categories','prices')->get();
        $categories = Categories::with('products')->orderBy('title')->get();
        return view('manufacturer_view',['products'=>$products,'categories'=>$categories,'prod'=>$prod,'prodcount'=>$prodcount]);
    }
}
