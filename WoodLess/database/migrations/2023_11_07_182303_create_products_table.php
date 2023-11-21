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

            $table->string('images', 255)->default('no-image.svg');

            $table->json('attributes')->nullable();
            $table->string('tags')->nullable();
            $table->string('categories', 255);
            $table->decimal('cost', 8, 2)->default(0);
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
