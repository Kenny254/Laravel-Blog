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
//Route::get('datatables.data', 'PostsController@anyData')->name('datatables.data');
Route::get('read', 'PagesController@getRead');
Route::get('/', 'PagesController@getIndex');


/*

/*
---------------------------------------------------------------------------
 Backend Routes
---------------------------------------------------------------------------
All these routes point to all static pages of this application
*/

Route::get('dashboard', 'Backend\PagesController@getIndex');
Route::resource('posts', 'PostsController');

/*
---------------------------------------------------------------------------
 Blog post Routes
---------------------------------------------------------------------------
All these routes point to all static pages of this application
*/

