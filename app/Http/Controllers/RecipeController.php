<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index() {
        return response()->json(Recipe::all());
    }
    public function getRecipe($id) {
        return response()->json(Recipe::find($id));
    }
}
