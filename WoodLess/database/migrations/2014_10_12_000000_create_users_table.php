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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('phone_number', 15);
            $table->string('image', 255)->default('no-image.svg');
            $table->tinyInteger('access_level')->default(1);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            $table->index(['last_name','first_name'],'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
