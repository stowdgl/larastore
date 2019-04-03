<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'fio','city', 'email', 'paymentmeth','npo','phone'
    ];
    public function products(){
        return $this->belongsToMany('App\Products');
    }
}
