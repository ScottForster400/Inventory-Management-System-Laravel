<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{

    use HasFactory;
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

