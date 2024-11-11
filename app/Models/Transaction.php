<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users(){
        return $this->belongsTo(Product::class);
    }
    public function proudcts(){
        return $this->belongsTo(Transaction::class);
    }
}
