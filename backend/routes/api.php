<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeListController;

// Unauthenticated APIs
Route::group(["prefix"=>"guest"], function(){
    Route::get('unauthorized',[AuthController::class, 'unauthorized'])->name("unauthorized");
    Route::post('login',[AuthController::class, 'login']);
    Route::post('register',[AuthController::class, 'register']);
});
// Authenticated APIs
Route::group(["middleware"=>"auth:api"], function(){

    Route::group(["middleware"=>"auth.admin"],function(){
        // admin APIs
    });

    Route::group(["prefix"=>"user"], function(){
        Route::post('addrecipe', [RecipeController::class, 'addRecipe']);
        Route::post('adduserlist', [RecipeListController::class, 'addUserList']);
        Route::get('addreciprlist', [RecipeListController::class, 'addRecipeList']);
        Route::get('getAllUserLists', [RecipeListController::class, 'getAllUserLists']);
        Route::post('logout',[AuthController::class, 'logout']);
        Route::post('refresh',[AuthController::class, 'refresh']);
    });
});