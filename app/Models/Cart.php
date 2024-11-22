<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function products() {
        return $this->hasMany(Product::class);
    }
    public function users() {
        return $this->hasOne(User::class);
    }

}

