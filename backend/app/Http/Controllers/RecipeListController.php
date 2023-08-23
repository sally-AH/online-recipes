<?php

namespace App\Http\Controllers;

use App\Models\RecipeList;
use App\Models\Recipe;
use App\Models\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeListController extends Controller {
    
    // public function getUserListDetails() {

    //     $user = Auth::user();
    //     $lists = $user->userLists;
    //     foreach ($lists as $list) {
    //         $recipeLists = RecipeList::where('list_id', $list->id)->get();
    //     }



    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $recipeLists,
    //     ], 200);
    // }

    // public function getUserListDetails() {
    //     $user = Auth::user();
    //     $lists = $user->userLists;
    
    //     $allRecipeLists = []; // Initialize an array to store all recipe lists
    
    //     foreach ($lists as $list) {
    //         $recipeLists = RecipeList::where('list_id', $list->id)->get();
    //         $allRecipeLists[$list->id] = $recipeLists; // Store recipe lists in the array
    //     }
    
    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $allRecipeLists, // Return all recipe lists
    //     ], 200);
    // }

    // public function getUserListDetails() {
    //     $user = Auth::user();
    //     $lists = $user->userLists;
    
    //     $allUserLists = []; // Initialize an array to store all user lists with their recipe lists
    
    //     foreach ($lists as $list) {
    //         $recipeLists = RecipeList::where('list_id', $list->id)->get();
    
    //         $allUserLists[] = [
    //             'user_list' => $list,
    //             'recipe_lists' => $recipeLists,
    //         ];
    //     }
    
    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $allUserLists,
    //     ], 200);
    // }

    // public function getUserListDetails() {
    //     $user = Auth::user();
    //     $lists = $user->userLists;
    
    //     $allUserLists = []; // Initialize an array to store all user lists with embedded recipes
    
    //     foreach ($lists as $list) {
    //         $recipeLists = RecipeList::where('list_id', $list->id)->get();
    //         $recipesArray = $recipeLists->pluck('recipe_id')->toArray(); // Get an array of recipe IDs
    
    //         $list->recipes = $recipesArray; // Embed recipes array within the list
    
    //         $allUserLists[] = $list; // Add the list to the allUserLists array
    //     }
    
    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $allUserLists,
    //     ], 200);
    // }

    public function getUserListDetails() {
        $user = Auth::user();
        $lists = $user->userLists;
    
        $allUserLists = []; // Initialize an array to store all user lists with embedded recipes
    
        foreach ($lists as $list) {
            $recipeLists = RecipeList::where('list_id', $list->id)->get();
            $recipesArray = $recipeLists->pluck('recipe_id')->toArray(); // Get an array of recipe IDs
    
            $recipes = Recipe::whereIn('id', $recipesArray)->get(); // Retrieve recipe details
    
            $list->recipes = $recipes; // Embed recipe details within the list
    
            $allUserLists[] = $list; // Add the list to the allUserLists array
        }
    
        return response()->json([
            'status' => 'success',
            'data' => $allUserLists,
        ], 200);
    }
    
    
    
    
    
}
