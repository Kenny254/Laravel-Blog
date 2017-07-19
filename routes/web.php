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

/*
---------------------------------------------------------------------------
 Frontend Routes
---------------------------------------------------------------------------
All these routes point to all static pages of this application
*/

Route::get('blog', 'BlogController@getIndex')->name('blog.index');
Route::get('blog/{slug}', 'BlogController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');
Route::get('/', 'PagesController@getIndex');


/*

/*
---------------------------------------------------------------------------
 Backend Routes
---------------------------------------------------------------------------
All these routes point to all static pages of this application
*/

Route::get('/profile', 'Backend\PagesController@getProfile');
Route::get('dashboard', 'Backend\PagesController@getIndex');
Route::resource('posts', 'PostsController');

/*
---------------------------------------------------------------------------
 Blog post Routes
---------------------------------------------------------------------------
All these routes point to all static pages of this application
*/

Auth::routes();

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
