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
        'as' => 'find.category'
    ]);

    Route::get('blog/{slug}', [
        'uses' => 'PostController@showpost',
        'as' => 'showpost'
    ]);

    Route::get('showallcategories',[
        'uses'=> 'CategoryController@showallcategories',
        'as' => 'showallcategories'

    ]);

    Route::post('/post/comment/{id}', [
        'uses' => 'PostController@reply',
        'as' => 'post.comment'
    ]);

    Route::get('/post/disable/{id}', [
        'uses' => 'PostController@disablepost',
        'as' => 'post.disable'
    ]);

    Route::get('/post/enable/{id}', [
        'uses' => 'PostController@enablepost',
        'as' => 'post.enable'
    ]);

    Route::get('/post/edit/{slug}', [
        'uses' => 'PostController@edit',
        'as' => 'post.edit'
    ]);

    Route::post('/post/update/{id}', [
        'uses' => 'PostController@update',
        'as' => 'post.update'
    ]);

    Route::patch('category/update/{id}', [
        'uses' => 'CategoryController@update',
        'as' => 'category.update'
    ]);

    Route::delete('/category/delete/{id}', [
        'uses' => 'CategoryController@delete',
        'as' => 'category.delete'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoryController@edit',
        'as' => 'category.edit'
    ]);

    Route::post('/storecategory/', [
        'uses' => 'CategoryController@store',
        'as' => 'category.store'
    ]);

    Route::get('/createcategory/', [
        'uses' => 'CategoryController@create',
        'as' => 'category.create'
    ]);





});