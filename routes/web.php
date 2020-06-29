<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|['middleware' => ['web']],
*/
Route::group( ['middleware' => ['web'] , 'namespace' => 'front', 'prefix' => 'front'],function () {

    Route::get('/contact','WelcomeController@getcontact' )->name('contact');

    Route::get('/about','WelcomeController@getabout')->name('about');
    Route::get('/category', 'WelcomeController@getcategory')->name('category');

    Route::post('/contact', 'WelcomeController@postContact');

    Route::get('/postShow/{id}', 'WelcomeController@postShow')->name('postShow');
    Route::get('/search', 'WelcomeController@search')->name('search');

});

Route::get('/','front\WelcomeController@index')->name('Myblog');



    Route::POST('/like', 'front\WelcomeController@like')->name('like');
    Route::POST('/dislike', 'front\WelcomeController@dislike')->name('dislike');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
