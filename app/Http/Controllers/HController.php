<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HController extends Controller
{
    //
    public function home($name){
        return view('app',['name'=>$name]);
    }
}
