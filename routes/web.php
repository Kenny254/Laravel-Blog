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



Route::middleware(['role:superadministrator|administrator|editor|author'])->group(function () {
	Route::get('dashboard', 'Backend\PagesController@getIndex');
	Route::resource('posts', 'PostsController');
	Route::resource('users', 'Backend\UsersController');
	Route::resource('permissions', 'Backend\PermissionsController');
	Route::resource('roles', 'Backend\RolesController');
	Route::resource('categories', 'Backend\CategoriesController');
});

Route::get('profile', 'Backend\PagesController@getProfile');
Route::post('profile', 'Backend\UsersController@changeAvatar')->name('image.upload');


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
