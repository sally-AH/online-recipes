<?php

namespace App\Http\Controllers;

use App\Models\RecipeList;
use App\Models\Recipe;
use App\Models\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeListController extends Controller {

    public function getUserListDetails() {
        $user = Auth::user();
        $lists = $user->userLists;
    
        $allUserLists = []; 
    
        foreach ($lists as $list) {
            $recipeLists = RecipeList::where('list_id', $list->id)->get();
            $recipesArray = $recipeLists->pluck('recipe_id')->toArray(); 
    
            $recipes = Recipe::whereIn('id', $recipesArray)->get(); 
    
            $list->recipes = $recipes; 
    
            $allUserLists[] = $list; 
        }
    
        return response()->json([
            'status' => 'success',
            'data' => $allUserLists,
        ], 200);
    }
    
    
    
    
    
}
