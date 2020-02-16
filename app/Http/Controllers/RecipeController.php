<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index() {
        return response()->json(Recipe::all());
    }

    public function store(Request $request)  {
        $recipe = Recipe::create([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
        $data = [
            'status' => (bool) $recipe,
            'message' => $recipe ? "Recipe created" : "Error creating recipe",
            'data' => $recipe
        ];
        return response()->json($data);
    }

    public function getRecipe($id) {
        return response()->json(Recipe::find($id));
    }
}
