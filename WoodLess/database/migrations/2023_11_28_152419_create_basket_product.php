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
        Schema::create('basket_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('basket_id');
            $table->unsignedBigInteger('product_id');
            //$table->primary(['basket_id', 'product_id']);
            $table->integer('amount')->default(1);
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        // Add foregin key constraint
        Schema::table('basket_product', function (Blueprint $table) {
            $table->foreign('basket_id')->references('user_id')->on('baskets')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
