<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cuisine() {
        return $this->belongsTo(Cuisine::class);
    }

    public function recipeDetails() {
        return $this->hasMany(RecipeDetail::class);
    }

        public function likes() {
        return $this->hasMany(Like::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function lists()
    {
        return $this->hasMany(RecipeList::class);
    }

    public function plans() {
        return $this->hasMany(Plan::class);
    }
}
