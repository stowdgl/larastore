<?php

namespace App\Http\Controllers;

use App\Products;
use App\Categories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products= Products::with('categories','prices')->orderBy('created_at')->get();
        $newproducts = Products::with('categories','prices')->orderBy('created_at','desc')->take(3)->get();
        $categories = Categories::with('products')->orderBy('title')->get();
        return view('app',['categories'=>$categories,'products'=>$products,'new_products'=>$newproducts]);
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
    public function grid(){
        $products= Products::with('categories','prices')->orderBy('created_at')->get();
        $categories = Categories::with('products')->orderBy('title')->get();
        return view('grid_view',['categories'=>$categories,'products'=>$products]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $products =Products::with('prices')->where('id',$request['id'])->get();
        $categories = Categories::with('products')->orderBy('title')->get();
        $relprod = Products::with('categories','prices')->take(5)->get();
        return view('details',['categories'=>$categories,'products'=>$products,'relprod'=>$relprod]);
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
