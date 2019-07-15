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
Route::get('/account', 'HomeController@index')->name('account.index'); // top page
Route::get('/account/register', 'AccountController@register')->name('account.register');
Route::get('/account/1', 'AccountController@user')->name('account.user');

// Target
Route::get('/account/1/target', 'TargetController@index')->name('target.index');
Route::get('/account/1/target/register', 'TargetController@targetRegister')->name('target.register');

// Follow
Route::get('/account/1/follow', 'FollowController@index')->name('follow.index');
Route::get('/account/1/follow/keywords', 'FollowController@keywords')->name('follow.keywords');

// Favorite
Route::get('/account/1/favorite', 'FavoriteController@index')->name('favorite.index');
Route::get('/account/1/favorite/keywords', 'FavoriteController@keywords')->name('favorite.keywords');

// Tweet
Route::get('/account/1/tweet', 'TweetController@index')->name('tweet.index');
