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
            $table->string('title', 255);
            $table->longText('description');

            /**
             * Image Path. 
             * We should list the file path of images a product should use, so that we can retrieve them later.
             */
            //$table->string('images', 255);

            $table->json('attributes')->nullable();
            $table->string('tags')->nullable();
            $table->string('categories', 255);
            $table->integer('cost');
            $table->integer('discount')->nullable();
            $table->integer('amount')->default(0);
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
