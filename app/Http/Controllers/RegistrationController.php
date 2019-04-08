<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use App\User;
use App\Products;
class RegistrationController extends Controller
{


    public function create(Request $request){
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
        $allproducts= Products::with('categories','prices')->orderBy('created_at')->get();
        return view('auth.register',['prodcount'=>$prodcount,'categories'=>$categories,'products'=>$products,'allproducts'=>$allproducts]);
    }
    public function store(Request $request){
        $this->validate(request(),[
            'fname'=>'required',
            'lname'=>'required',
            'gender'=>'required',
            'pword'=>'required',
            'email'=>'required|email',
            'days'=>'required',
            'months'=>'required',
            'year'=>'required'

        ]);
        $user = User::create([
            'fname'=>$request['fname'],
            'lname'=> $request['lname'],
            'gender'=>$request['gender'],
            'password'=>$request['pword'],
            'email'=>$request['email'],
            'birthday'=>$request['year'].'-'.$request['months'].'-'.$request['days']
        ]);
        auth()->login($user);
        return redirect()->route('home')->with(['name'=>$request['fname']]);
    }


}
