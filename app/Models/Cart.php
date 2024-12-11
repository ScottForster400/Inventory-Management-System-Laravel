<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $guarded = [];

    protected $primaryKey = 'cart_id';

     public function getRouteKeyName(){
        return null;
     }
    public function products() {
        return $this->hasMany(Product::class);
    }
    public function users() {
        return $this->hasOne(User::class);
    }

}

