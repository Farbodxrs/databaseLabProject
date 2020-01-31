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
