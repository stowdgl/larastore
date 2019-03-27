<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegistrationController extends Controller
{


    public function create(){
        return view('auth.register');
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
