<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        \App\Recipe::create(
            [
            'title' => "Afang Soup Recipe",
            'body' => "Boil the beef and Kanda with diced onions"
            ],
            [
            'title' => "White Moi Moi",
            'body' => "Blend beans with crushed stock cubes"
            ]
        );
    }
}
