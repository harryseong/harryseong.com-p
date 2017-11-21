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

// Authentication
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

// Categories
Route::resource('categories', 'CategoryController', ['except' => ['create'] ]);

// Comments
Route::post('comments/{post_id}', ['as' => 'comments.store', 'uses' => 'CommentsController@store']);
Route::get('comments/{id}/edit', ['as' => 'comments.edit', 'uses' => 'CommentsController@edit']);
Route::put('comments/{id}', ['as' => 'comments.update', 'uses' => 'CommentsController@update']);
Route::delete('comments/{id}', ['as' => 'comments.destroy', 'uses' => 'CommentsController@destroy']);

// Blog
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
    ->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['as' => 'blog.index','uses' => 'BlogController@getIndex']);

// Pages
Route::get('/', 'PagesController@getIndex');
Route::get('books', 'PagesController@getBooks');
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::get('cv', 'PagesController@getCV');

// Places
Route::resource('places', 'PlaceController');
Route::get('place/{id}', 'PlaceController@getPlace');

// Posts
Route::resource('posts', 'PostController');

// Tags
Route::resource('tags', 'TagController', ['except' => ['create'] ]);



