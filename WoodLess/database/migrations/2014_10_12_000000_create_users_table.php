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

            /**
             * Image Path. 
             * We should list the file path of a profile image, so that we can retrieve them.
             */
            //$table->string('profile_picture', 255);

            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('phone_number', 15);
            $table->boolean('admin')->default(false);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
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
