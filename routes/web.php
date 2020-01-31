<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [
    'uses' => 'UsersController@index',
    'as' => 'users.all.get',
]);
Route::get('/users/{id}', [
    'uses' => 'UsersController@show',
    'as' => 'users.one.get',
]);


Route::post('/users/{id}', [
    'uses' => 'UsersController@update',
    'as' => 'users.one.post',
]);

Route::delete('/users/{id}', [
    'uses' => 'UsersController@destroy',
    'as' => 'users.one.delete',
]);
Route::get('/createuser', [
    'uses' => 'UsersController@showCreate',
    'as' => 'users.show.create',
]);
Route::post('/createuser', [
    'uses' => 'UsersController@create',
    'as' => 'users.one.create',
]);
Route::get('/address/{userid}', [
    'uses' => 'AddressController@index',
    'as' => 'address.get',
]);
Route::get('/editaddress/{id}', [
    'uses' => 'AddressController@show',
    'as' => 'address.one.get',
]);
Route::post('/editaddress/{id}', [
    'uses' => 'AddressController@update',
    'as' => 'address.one.post',
]);
Route::delete('/editaddress/{id}', [
    'uses' => 'AddressController@destroy',
    'as' => 'address.one.delete',
]);
Route::post('/createaddress', [
    'uses' => 'AddressController@store',
    'as' => 'address.one.create',
]);
Route::get('/foods', [
    'uses' => 'FoodController@index',
    'as' => 'foods.all.get',
]);

Route::post('/foods', [
    'uses' => 'FoodController@create',
    'as' => 'foods.one.post',
]);

Route::post('/foods/{id}', [
    'uses' => 'FoodController@update',
    'as' => 'foods.one.update',
]);

Route::delete('/foods/{id}', [
    'uses' => 'FoodController@destroy',
    'as' => 'foods.one.delete',
]);
Route::get('/foods/{id}', [
    'uses' => 'FoodController@show',
    'as' => 'foods.one.get',
]);

Route::get('/bikes', [
    'uses' => 'BikeController@index',
    'as' => 'bikes.all.get',
]);


Route::post('/bikes', [
    'uses' => 'BikeController@create',
    'as' => 'bikes.one.post',
]);

Route::post('/bikes/{id}', [
    'uses' => 'BikeController@update',
    'as' => 'bikes.one.update',
]);

Route::delete('/bikes/{id}', [
    'uses' => 'BikeController@destroy',
    'as' => 'bikes.one.delete',
]);
Route::get('/bikes/{id}', [
    'uses' => 'BikeController@show',
    'as' => 'bikes.one.get',
]);


Route::get('/shops', [
    'uses' => 'ShopController@index',
    'as' => 'shops.all.get',
]);
Route::post('/shops', [
    'uses' => 'ShopController@create',
    'as' => 'shops.one.post',
]);

Route::post('/shops/{id}', [
    'uses' => 'ShopController@update',
    'as' => 'shops.one.update',
]);

Route::delete('/shops/{id}', [
    'uses' => 'ShopController@destroy',
    'as' => 'shops.one.delete',
]);
Route::get('/shops/{id}', [
    'uses' => 'ShopController@show',
    'as' => 'shops.one.get',
]);
