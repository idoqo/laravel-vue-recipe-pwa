<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        \App\Recipe::insert([
            [
                'title' => "Nigerian Jollof Rice with Chicken",
                'body' => "Test Recipe. Chicken is first sauteed on the stove top to produce a wonderful aromatic base for the rice.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'title' => "Ghana Demerara Brownies",
                'body' => "Test Recipe. Preheat oven to 325 degrees F (165 degrees C). Lightly butter a 9x13-inch baking dish. ",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);
    }
}
