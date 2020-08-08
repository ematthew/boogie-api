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



/*
|--------------------------------------------------------------------------
| PRODUCT
|--------------------------------------------------------------------------
|*/

Route::get('/product', 'ProductController@fetchall');
Route::post('/product', 'ProductController@create');
Route::post('/product/{id}', 'ProductController@update');
Route::get('/product/{id}', 'ProductController@fetchone');
Route::delete('/product/{id}', 'ProductController@delete');


/*
|--------------------------------------------------------------------------
| BANNER
|--------------------------------------------------------------------------
|*/

Route::get('/banner', 'BannerController@fetchall');
Route::get('/banner/{id}', 'BannerController@fetchone');
Route::post('/banner', 'BannerController@create');
Route::post('/banner/{id}', 'BannerController@update');
Route::delete('/banner/{id}', 'BannerController@delete');




/*
|--------------------------------------------------------------------------
| LOCATION
|--------------------------------------------------------------------------
|*/
Route::get('/location', 'LocationController@fetchall');
Route::get('/location/{id}', 'LocationController@fetchone');
Route::post('/location', 'LocationController@create');
Route::post('/location/{id}', 'LocationController@update');
Route::delete('/location/{id}', 'LocationController@delete');


/*
|--------------------------------------------------------------------------
| STORE
|--------------------------------------------------------------------------
|*/

Route::post('/store', 'StoreController@store');



/*
|--------------------------------------------------------------------------
| MARKETER
|--------------------------------------------------------------------------
|*/
Route::get('/marketer', 'MarketerController@fetchall');
Route::get('/marketer/{id}', 'MarketerController@fetchone');
Route::post('/marketer', 'MarketerController@create');
Route::post('/marketer/{id}', 'MarketerController@update');
Route::delete('/marketer/{id}', 'MarketerController@delete');


/*
|--------------------------------------------------------------------------
| CATEGORY
|--------------------------------------------------------------------------
|*/


Route::get('/category', 'CategoryController@fetchall');
Route::get('/category/{id}', 'CategoryController@fetchone');
Route::post('/category', 'CategoryController@create');
Route::post('/category/{id}', 'CategoryController@update');
Route::delete('/category/{id}', 'CategoryController@delete');


/*
|--------------------------------------------------------------------------
| FEEDBACK
|--------------------------------------------------------------------------
|*/

Route::get('/feedback', 'FeedbackController@fetchall');
Route::get('/feedback/{id}', 'FeedbackController@fetchone');
Route::post('/feedback', 'FeedbackController@create');
Route::post('/feedback/{id}', 'FeedbackController@update');
Route::delete('/feedback/{id}', 'FeedbackController@delete');

/*
|--------------------------------------------------------------------------
| MESSAGE
|--------------------------------------------------------------------------
|*/


Route::get('/message', 'MessageController@fetchall');
Route::get('/message/{id}', 'MessageController@fetchone');
Route::post('/message', 'MessageController@create');
Route::post('/message/{id}', 'MessageController@update');
Route::delete('/message/{id}', 'MessageController@delete');


/*
|--------------------------------------------------------------------------
| NOTIFICATION
|--------------------------------------------------------------------------
|*/

Route::get('/notification', 'NotificationController@fetchall');
Route::get('/notification/{id}', 'NotificationController@fetchone');
Route::post('/notification', 'NotificationController@create');
Route::post('/notification/{id}', 'NotificationController@update');
Route::delete('/notification/{id}', 'NotificationController@delete');


/*
|--------------------------------------------------------------------------
| ORDER
|--------------------------------------------------------------------------
|*/

Route::get('/order', 'OrderController@fetchall');
Route::get('/order/{id}', 'OrderController@fetchone');
Route::post('/order', 'OrderController@create');
Route::post('/order-by-list', 'OrderController@orderByList');
Route::post('/order-by-images', 'OrderController@orderByImage');
Route::post('/order-by-voice', 'OrderController@orderByVoice');
Route::post('/order/{id}', 'OrderController@update');
Route::delete('/order/{id}', 'OrderController@delete');



