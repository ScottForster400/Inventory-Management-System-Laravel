<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'product_id';
    public function getRouteKeyName(){
        return 'product_id';
    }

    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function products() {
        return $this->belongsTo(Product::class);
    }
}
