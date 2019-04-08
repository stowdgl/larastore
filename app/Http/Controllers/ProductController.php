<?php

namespace App\Http\Controllers;
use App\Products;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart');

        $products = [];
        if (isset($cart)) {
            foreach ($cart as $item) {
                $products[] = Products::with('categories', 'prices')->where('id', $item)->get();
            }
        }
        $prodcount= count($products);
        //
        $products= Products::with('categories','prices')->orderBy('created_at')->paginate(10);
        $newproducts = Products::with('categories','prices')->orderBy('created_at','desc')->take(3)->get();
        $categories = Categories::with('products')->orderBy('title')->get();

        return view('app',['categories'=>$categories,'products'=>$products,'new_products'=>$newproducts,'prodcount'=>$prodcount]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function grid(Request $request){
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
        return view('grid_view',['categories'=>$categories,'products'=>$products,'prodcount'=>$prodcount]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cart = $request->session()->get('cart');

        $products = [];
        if (isset($cart)) {
            foreach ($cart as $item) {
                $products[] = Products::with('categories', 'prices')->where('id', $item)->get();
            }
        }
        $prodcount= count($products);
        $upProducts = Products::with('categories','prices')->orderBy('created_at')->get();
        $products =Products::with('prices')->where('id',$request['id'])->get();
        $prod = Products::with('categories','prices')->get();
        $categories = Categories::with('products')->orderBy('title')->get();
        $relprod = Products::with('categories','prices')->take(5)->get();
        $allproducts= Products::with('categories','prices')->orderBy('created_at')->get();
        return view('details',['categories'=>$categories,'products'=>$products,'relprod'=>$relprod,'prod'=>$prod,'upProducts'=>$upProducts,'prodcount'=>$prodcount,'allproducts'=>$allproducts]);
    }

    public function search(Request $request){
        $cart = $request->session()->get('cart');

        $products = [];
        if (isset($cart)) {
            foreach ($cart as $item) {
                $products[] = Products::with('categories', 'prices')->where('id', $item)->get();
            }
        }
        $prodcount= count($products);
        $productss= Products::with('categories','prices')->orderBy('created_at')->get();
        $products= Products::with('categories','prices')->orderBy('created_at')->get();
        $categories = Categories::with('products')->orderBy('title')->get();
        $prod = Products::with('categories','prices')->where('title','LIKE',"%".htmlspecialchars($request['search'])."%")->orWhere('code','LIKE',"%".htmlspecialchars($request['search'])."%")->get();
        return view('search_view',['products'=>$products,'categories'=>$categories,'prod'=>$prod,'productss'=>$productss,'prodcount'=>$prodcount]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
