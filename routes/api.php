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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// List roleType
Route::get('roleTypes', 'roleTypeController@index');

// List single roleType
Route::get('roleType/{id}', 'roleTypeController@show');

// Create new roleType
Route::post('roleType', 'roleTypeController@store');

// Update roleType
Route::put('roleType', 'roleTypeController@store');

// Delete roleType
Route::delete('roleType/{id}', 'roleTypeController@destroy');

#Account routes
// List account
Route::get('accounts', 'AccountController@index');
// List single account
Route::get('account/{id}', 'AccountController@show');
// Create new account
Route::post('account', 'AccountController@store');
// Update account
Route::put('account', 'AccountController@store');
// Delete account
Route::delete('account/{id}', 'AccountController@destroy');

