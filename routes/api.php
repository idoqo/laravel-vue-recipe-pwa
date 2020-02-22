<?php

Route::post('/register-token', 'NotificationsController@createBinding');

Route::group(['prefix' => 'recipes'], function() {
    Route::get('/{id}', 'RecipeController@getRecipe');
    Route::get('/', 'RecipeController@index');
    Route::post('/', 'RecipeController@store');
});
