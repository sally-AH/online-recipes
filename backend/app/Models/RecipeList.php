<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeList extends Model
{
    use HasFactory;

    public function userList() {
        return $this->belongsTo(UserList::class);
    }

    public function recipe() {
        return $this->belongsTo(Recipe::class);
    }

}
