<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


/*
|--------------------------------------------------------------------------
| INTRO
|--------------------------------------------------------------------------
|*/
Route::get('/', 'ApiTestController@index');


/*
|--------------------------------------------------------------------------
| REGISTER 
|--------------------------------------------------------------------------
|*/
Route::post('/users', 	'RegisterController@create');
Route::get('/users', 	'RegisterController@fetchall');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
|*/
Route::post('/login',	'LoginController@loginUser');

/*
|--------------------------------------------------------------------------
| RESET PASSWORD
|--------------------------------------------------------------------------
|*/
Route::post('/reset/link',		'PasswordResetController@sendLink');
Route::post('/reset/password',	'PasswordResetController@resetPassword');

