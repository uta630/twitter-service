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

// Account
Route::get('/account', 'Account\AccountController@index') // top page
    ->name('account.index');
Route::get('/account/register', 'Account\AccountController@register')
    ->name('account.register');
Route::get('/account/{id}', 'Account\AccountController@user')
    ->where('id', '[0-9]+')
    ->name('account.user');

// Target
Route::get('/account/{id?}/target', 'Account\TargetController@index')
    ->where('id', '[0-9]+')
    ->name('target.index');
Route::get('/account/{id?}/target/register', 'Account\TargetController@targetRegister')
    ->where('id', '[0-9]+')
    ->name('target.register');

// Follow
Route::get('/account/{id?}/follow', 'Contents\FollowController@index')
    ->where('id', '[0-9]+')
    ->name('follow.index');
Route::get('/account/{id?}/follow/keywords', 'Contents\FollowController@keywords')
    ->where('id', '[0-9]+')
    ->name('follow.keywords');

// Favorite
Route::get('/account/{id?}/favorite', 'Contents\FavoriteController@index')
    ->where('id', '[0-9]+')
    ->name('favorite.index');
Route::get('/account/{id?}/favorite/keywords', 'Contents\FavoriteController@keywords')
    ->where('id', '[0-9]+')
    ->name('favorite.keywords');

// Tweet
Route::get('/account/{id?}/tweet', 'Contents\TweetController@index')
    ->where('id', '[0-9]+')
    ->name('tweet.index');
