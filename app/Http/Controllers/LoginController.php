<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use App\Products;
class LoginController extends Controller
{
    //
    public function create(Request $request){
        if (!auth()->check()) {
            $cart = $request->session()->get('cart');

            $products = [];
            if (isset($cart)) {
                foreach ($cart as $item) {
                    $products[] = Products::with('categories', 'prices')->where('id', $item)->get();
                }
            }
            $prodcount = count($products);
            $products = Products::with('categories', 'prices')->orderBy('created_at')->paginate(10);
            $categories = Categories::with('products')->orderBy('title')->get();
            $allproducts = Products::with('categories', 'prices')->orderBy('created_at')->get();
            return view('auth.login', ['prodcount' => $prodcount, 'categories' => $categories, 'products' => $products, 'allproducts' => $allproducts]);
        }else{
            return redirect('/');
        }
    }
    public function store(Request $request){
        if (auth()->attempt(['email'=>$request['email'],'password'=>$request['pword']]) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }else{
            return redirect()->route('home');
        }


    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
    public function account(Request $request){
        $cart = $request->session()->get('cart');

        $products = [];
        if (isset($cart)) {
            foreach ($cart as $item) {
                $products[] = Products::with('categories', 'prices')->where('id', $item)->get();
            }
        }
        $prodcount= count($products);
        $products= Products::with('categories','prices')->orderBy('created_at')->paginate(10);
        $categories = Categories::with('products')->orderBy('title')->get();
        return view('auth.account',['prodcount'=>$prodcount,'categories'=>$categories,'products'=>$products]);
    }
}
