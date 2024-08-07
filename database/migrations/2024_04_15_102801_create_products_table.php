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
            $table->string('product_name');
            $table->string('description');
            $table->integer('price');
            $table->string('image');
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('category');
            $table->unsignedBigInteger('sub_category');
            $table->foreign('sub_category')->references('id')->on('sub_category');
            $table->string('visible')->nullable();
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
