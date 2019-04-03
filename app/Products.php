<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function categories(){
        return $this->belongsToMany('App\Categories');
    }
    public function prices(){
        return $this->belongsToMany('App\Prices');
    }
    public function orders(){
        return $this->belongsToMany('App\Orders');
    }
}
