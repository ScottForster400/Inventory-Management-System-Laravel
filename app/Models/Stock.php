<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function branches(){
        return $this->belongsTo(Branch::class);
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
