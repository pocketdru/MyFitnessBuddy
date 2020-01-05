<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

Route::resource('/meals', 'MealsController');
Route::put("meals/{id}/edit", "MealsController@update");
Route::resource("/foods", "FoodController");
Route::get('meals/foods/{id}/edit', 'FoodController@edit');
Route::put("meals/foods/{id}/edit", "FoodController@update");
Route::get('meals/foods/{id}', 'FoodController@destroy');



});