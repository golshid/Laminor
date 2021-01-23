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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('categories', 'CategoryController');

    Route::get('post/create/', [
        'uses' => 'PostController@create',
        'as' => 'post.create'
    ]);

    Route::post('post/store/', [
        'uses' => 'PostController@store',
        'as' => 'post.store'
    ]);

    Route::get('post/inbox/', [
        'uses' => 'PostController@admininbox',
        'as' => 'admin.inbox'
    ]);

    Route::get('category/{slug}', [
        'uses' => 'CategoryController@findcategory',
        'as' => 'category'
    ]);

});