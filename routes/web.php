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

//Route::get('/','PagesController@root')->name('root');
Route::get('/', 'TopicsController@index')->name('root');

Auth::routes();

Auth::routes(['verify' => true]);

Route::resource('users','UsersController',['only'=>['show','edit','update']]);
Route::resource('topics',"TopicsController",['only'=>['index','create','store','destroy','edit','update']]);
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');

Route::get('topics/{topic}/{slug?}','TopicsController@show')->name('topics.show');
Route::resource('replies','RepliesController',['only'=>['store','destroy']]);


Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);

Route::get('permission-denied', 'PagesController@permissionDenied')->name('permission-denied');
