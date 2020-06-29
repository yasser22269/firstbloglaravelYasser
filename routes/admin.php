<?php

// use Illuminate\Routing\Route;

use Illuminate\Support\Facades\Route;
 use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//'middleware' => ['admin'] ,
Route::group( [ 'namespace' => 'back', 'prefix' => 'dashboard','middleware' =>'auth'],function () {

    Route::get('/index', 'DashboardController@index')->name('index');
    Route::resource('/users', 'UserController')->except(['show']);
    Route::resource('/posts', 'PostController')->except(['show']);
    Route::resource('/tags', 'TagController')->except(['show']);
    Route::resource('/categories', 'categoryController')->except(['show']);
    Route::resource('/comments', 'CommentController');
    // url('posts/updateimage/'.$posts->id)

    Route::any('posts/updateimage/{post}', 'PostController@updateimage')->name('updateimage');


});
