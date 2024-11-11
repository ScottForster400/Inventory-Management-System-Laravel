<?php

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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('name',50);
            $table->string('manufacturer',50);
            $table->text('description')->nullable();
            $table->integer('age_rating');
            $table->integer('minimum_player_count');
            $table->integer('maximum_player_count');
            $table->integer('game_length');
            $table->float('Price');
            $table->char('game_type',10);
            $table->char('game_genre',10);
            $table->string('image',250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};