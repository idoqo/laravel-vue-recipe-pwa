<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register-token', 'SPAController@createBinding');

Route::get('test-notification', 'SPAController@sendNotification');

Route::group(['prefix' => 'recipes'], function() {
    Route::get('/{id}', 'RecipeController@getRecipe');
    Route::get('/', 'RecipeController@index');
    Route::post('/', 'RecipeController@store');
});
