<?php

use App\Models\Branch;
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
        Schema::table('users', function (Blueprint $table) {
            $table->string('national_insurance_number',9);
            //phone number is 20 due to fake() phone number generation length
            $table->string('phonenumber',20);
            $table->date('dob');
            $table->string('address',50);
            $table->boolean('admin');
            $table->foreignIdFor(Branch::class);
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('national_insurance_number');
            $table->dropColumn('phonenumber');
            $table->dropColumn('dob');
            $table->dropColumn('address');
            $table->dropColumn('admin');
            $table->dropForeignIdFor(Branch::class);
        });
    }
};
