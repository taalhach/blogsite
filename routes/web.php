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

Route::GET('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function (){
    Route::GET('/','Admin\AdminController@index')->name('home')->middleware('is_admin');
//    Route::GET('/blog/{blog}','Blogs\BlogController@show')->name('submit_blog')->middleware('is_admin');

    Route::GET('/authors','Admin\AdminController@authors')->name('authors')->middleware('is_admin');
    Route::GET('/authors/{user}/blog','Admin\AdminController@author_blogs')->name('author_blogs')->middleware('is_admin');
    Route::GET('/authors/blog/{blog}','Admin\AdminController@blog')->name('author_blogs')->middleware('is_admin');

    Route::GET('/approvals','Admin\AdminController@approvals')->name('approvals')->middleware('is_admin');
    Route::GET('/favourites','Admin\AdminController@favourites')->name('favourites')->middleware('is_admin');
    Route::PATCH('/blog/{blog}','Blogs\BlogController@update')->name('approve_blog')->middleware('is_admin');

});
Route::prefix('author')->name('author.')->group(function (){
    Route::GET('/','Author\AuthorController@index')->name('home')->middleware('is_author');
    Route::GET('/write','Blogs\BlogController@create')->name('write_form')->middleware('is_author');

    Route::GET('/favourites','Author\AuthorController@favourites')->name('favourites')->middleware('is_author');
    Route::POST('/favourites/{blog}','Blogs\FavouritesController@store')->name('add_to_favourites')->middleware('is_author');
    Route::POST('/favourites/{blog}/like','Author\LikesController@store')->name('like_blog')->middleware('is_author');

    Route::GET('/blog','Author\AuthorController@diary')->name('diary')->middleware('is_author');
    Route::GET('/blog/{blog}','Blogs\BlogController@show')->name('show_blog')->middleware('is_author');
    Route::POST('/blog','Blogs\BlogController@store')->name('submit_blog')->middleware('is_author');
    Route::POST('/blog/{blog}/comment','Blogs\CommentController@store')->name('comment_blog')->middleware('is_author');
});



