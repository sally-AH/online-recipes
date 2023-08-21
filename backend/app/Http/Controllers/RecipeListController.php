<?php

namespace App\Http\Controllers;

use App\Models\RecipeList;
use App\Models\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeListController extends Controller
{
    public function addUserList() {

        $recipe = new UserList();
        $recipe->save();

        return response()->json([
            'status' => 'success',
            'data' => $recipe,
        ], 200);
    }


    public function addRecipeList(Request $request, $user_list_id) {
        // Find the user list
        $userList = UserList::findOrFail($user_list_id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'recipe_id' => 'required|integer',
            // You can add more validation rules here
        ]);

        // Create a new recipe list entry
        $recipeList = new RecipeList([
            'recipe_id' => $validatedData['recipe_id'],
            'user_id' => $userList->user_id,
        ]);
        $userList->recipeLists()->save($recipeList);

        return response()->json([
            'message' => 'Recipe added to list successfully',
            'data' => $recipeList,
        ], 201); // 201 Created status code
    }

    public function getAllUserLists() {
        $user = Auth::user();
        $lists = RecipeList::where('user_id', $user->id)->with('recipe')->get();
        return response()->json([
            'status' => 'success',
            'data' => $lists,
        ]);
    }
}
