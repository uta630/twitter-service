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
Route::get('/account', 'Account\AccountController@index')->name('account.index');
Route::post('/account/unsubscribe', 'Account\AccountController@unsubscribe')->name('account.unsubscribe');
Route::get('/account/register', 'Account\AccountController@register')->name('account.register');
Route::post('/account/create', 'Account\AccountController@create')->name('account.create');
Route::get('/account/{id}', 'Account\AccountController@user')->where('id', '[0-9]+')->name('account.user');
Route::post('/account/{id}/delete', 'Account\AccountController@accountDelete')->where('id', '[0-9]+')->name('account.accountDelete');

// Target
Route::get('/account/target', 'Account\TargetController@index')->name('target.index');
Route::post('/account/target/create', 'Account\TargetController@create')->name('target.create');
Route::get('/account/target/delete/{id}', 'Account\TargetController@delete')->where('id', '[0-9]+')->name('target.delete');

// Follow
Route::get('/account/{id}/follow', 'Contents\FollowController@index')->where('id', '[0-9]+')->name('follow.index');
Route::get('/account/follow/keywords', 'Contents\FollowController@keywords')->name('follow.keywords');
Route::post('/account/follow/create', 'Contents\FollowController@create')->name('follow.create');
Route::get('/account/follow/delete/{id}', 'Contents\FollowController@keywordDelete')->where('id', '[0-9]+')->name('follow.keywordDelete');

// Favorite
Route::get('/account/{id}/favorite', 'Contents\FavoriteController@index')->where('id', '[0-9]+')->name('favorite.index');
Route::get('/account/favorite/keywords', 'Contents\FavoriteController@keywords')->name('favorite.keywords');
Route::post('/account/favorite/create', 'Contents\FavoriteController@create')->name('favorite.create');
Route::get('/account/favorite/delete/{id}', 'Contents\FavoriteController@keywordDelete')->where('id', '[0-9]+')->name('favorite.keywordDelete');

// Tweet
Route::get('/account/{id}/tweet', 'Contents\TweetController@index')->where('id', '[0-9]+')->name('tweet.index');
Route::post('/account/{id}/tweet/reservation', 'Contents\TweetController@reservation')->where('id', '[0-9]+')->name('tweet.reservation');
    