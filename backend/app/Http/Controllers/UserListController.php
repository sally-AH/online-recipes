<?php

namespace App\Http\Controllers;
use App\Models\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListController extends Controller {
    public function addUserList(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $user = Auth::user();
        $list = new UserList();
        $list->user_id=$user->id;
        $list->name=$request->name;
        $list->save();

        return response()->json([
            'status' => 'success',
            'data' => $list,
        ], 200);
    }

    public function getUserLists() {
        $user = Auth::user();
        $lists = $user->userLists;

        return response()->json([
            'status' => 'success',
            'data' => $lists,
        ], 200);
    }

}
