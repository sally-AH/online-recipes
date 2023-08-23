<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListController;

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
        Route::get('getallrecipes', [RecipeController::class, 'getAllRecipes']);
        Route::post('adduserlist', [UserListController::class, 'addUserList']);
        Route::get('getuserlists', [UserListController::class, 'getUserLists']);
        Route::get('getuserlistdetails', [RecipeListController::class, 'getUserListDetails']);
        Route::get('getuserrecipes', [UserController::class, 'getUserRecipes']);

        
        Route::post('logout',[AuthController::class, 'logout']);
        Route::post('refresh',[AuthController::class, 'refresh']);
    });
});