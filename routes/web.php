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

// default
Route::get('/', function () { return view('welcome'); });

// account : https://teratail.com/questions/106720#reply-163235
// Router file : ~/vendor/laravel/framework/src/Illuminate/Routing/Router.php -> auth()
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// contents
Route::get('/account', 'AccountController@index')->name('account.index');
Route::get('/account/register', 'AccountController@register')->name('account.register');
Route::get('/account/1', 'AccountController@user')->name('account.user');

Route::get('/account/1/follow', 'AccountController@follow')->name('account.follow');
Route::get('/account/1/favorite', 'AccountController@favorite')->name('account.favorite');
Route::get('/account/1/tweet', 'AccountController@tweet')->name('account.tweet');
