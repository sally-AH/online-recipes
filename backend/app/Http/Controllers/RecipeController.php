<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Auth\Recaller;
use Illuminate\Http\Request;

class RecipeController extends Controller {

    public function addRecipe(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'pic_url' => 'required|string',
        ]);

        $recipe = new Recipe;
        $recipe->user_id=$request->user_id;
        $recipe->cuisine_id=$request->cuisine_id;
        $recipe->name=$request->name;
        $recipe->pic_url=$request->pic_url;
        $recipe->save();

        return response()->json([
            'status' => 'success',
            'data' => $recipe,
        ], 200);
    }

    public function getAllRecipes(){
        $recipes = Recipe::all();
        return response()->json([
            'status' => 'success',
            'data' => $recipes,
        ], 200);
    }
}
