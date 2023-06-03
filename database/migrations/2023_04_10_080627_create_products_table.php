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
            $table->id();
            $table->string('name');
            $table->string('Category');
            $table->string('Size');
            $table->integer('Qunatity_Box')->nullable();
            $table->integer('Qunatity_piece')->nullable();
            $table->date('man_date');
            $table->date('exp_date');
            $table->String('Desc',500)->nullable();
            $table->string('ProductImg')->nullable();
            $table->string('ProductImgPath')->nullable();
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
