<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserRecipes() {
        $user = Auth::user();
        $recipes = $user->recipes()->with('cuisine')->get();

        return response()->json([
            'status' => 'success',
            'data' => $recipes,
        ], 200);
    }
}
