<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function create(){
        return view('auth.login');
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
}
