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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("cuisine_id");
            $table->string('name');
            $table->text('pic_url');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('cuisines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('recipe_details', function (Blueprint $table) {
            $table->integer("recipe_id");
            $table->integer("ingredient_id");
            $table->integer("ingredient_quantity");
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
        Schema::dropIfExists('cuisines');
        Schema::dropIfExists('recipe_details');
        Schema::dropIfExists('ingredients');
    }
};
