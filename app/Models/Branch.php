<?php

namespace App\Models;


use App\Models\User;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users(){
        return $this->hasMany(User::class);
    }
    public function stocks(){
        return $this->hasMany(Stock::class);
    }
}
