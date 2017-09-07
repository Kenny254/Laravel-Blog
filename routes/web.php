<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| All these routes are accessible by all users in the frontend part   of 
| the apllication
|
*/

Auth::routes();
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('blog', 'BlogController@getIndex')->name('blog.index');
Route::get('blog/{slug}', 'BlogController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');
Route::get('/', 'PagesController@getIndex');
Route::resource('comments', 'CommentsController', ['except' => ['index', 'create']]);
Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');


/*
|--------------------------------------------------------------------------
| General Backend Routes
|--------------------------------------------------------------------------
|
| All these routes are only accessible by the user with a SUPERADMIN, 
| USER and ADMIN roles
|
*/
	
Route::namespace('Backend')->group(function () {
	Route::resource('posts', 'PostsController');
    Route::get('dashboard', 'PagesController@getIndex');
    Route::resource('emails', 'EmailsController', ['except' => ['edit', 'update']]);
	Route::get('sent', 'EmailsController@outbox')->name('emails.outbox');
	Route::get('profile', 'PagesController@getProfile');
	Route::post('profile', 'UsersController@changeAvatar')->name('image.upload');
});


/*
|--------------------------------------------------------------------------
| Superadmin and Admin Routes
|--------------------------------------------------------------------------
|
| All these routes are only accessible by the user with a SUPERADMIN and 
| ADMIN role
|
*/

Route::namespace('Backend')->group(function () {
	Route::resource('users', 'UsersController');
	Route::resource('permissions', 'PermissionsController');
	Route::resource('roles', 'RolesController');
	Route::resource('categories', 'CategoriesController');
	Route::resource('tags', 'TagsController');
	Route::get('users_pdf', 'PdfController@users')->name('users.pdf');
});












