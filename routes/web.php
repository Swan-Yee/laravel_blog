<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','PageController@index');

Route::get('/login','PageController@getLogin')->name('login');
Route::post('/login','PageController@postLogin')->name('user.login');

Route::get('/register','PageController@getRegister')->name('register');
Route::post('/register','PageController@postRegister')->name('user.register');

Route::get('/logout','PageController@Logout')->name('logout');

Route::get('/article/create','ArticleController@getCreate')->name('article.get.create');
Route::post('/article/create','ArticleController@postCreate')->name('article.post.create');

Route::get('/category/{slug}','PageController@articleByCategory');
Route::get('/language/{slug}','PageController@articleByLanguage');

Route::get('/detail/{slug}','PageController@detail');

Route::get('/article/like/{id}','PageController@createLike');
Route::post('/comment/create/','PageController@createComment');
