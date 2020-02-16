<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        \App\Recipe::insert([
            [
                'title' => "Afang Soup Recipe",
                'body' => "Boil the beef and Kanda with diced onions",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'title' => "White Moi Moi",
                'body' => "Blend beans with crushed stock cubes",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);
    }
}
