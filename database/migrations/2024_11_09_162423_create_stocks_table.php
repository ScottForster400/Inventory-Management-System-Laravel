<?php

use App\Models\Branch;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //called stocks due to laravel seeder requiring it
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('stock_id');
            $table->integer('amount')->default(0);
            $table->foreignIdFor(Branch::class,'branch_id');
            $table->foreignIdFor(Product::class,'product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
