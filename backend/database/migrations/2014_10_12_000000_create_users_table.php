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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('likes', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('recipe_id');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('recipe_id');
            $table->string('content');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('recipe_id');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('recipe_id');
            $table->dateTime('meal_date');
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('likes');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('lists');
        Schema::dropIfExists('plans');
    }
};
