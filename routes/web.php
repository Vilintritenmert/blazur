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

Route::pattern('id', '[0-9]+');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('user')->group(function(){
    Route::get('/', 'UserController@list')->middleware('hasPermission:view_user_list', 'userAction:view_user_list')->name('user.list');
    Route::get('view/{id}', 'UserController@view')->middleware('hasPermission:view_user', 'userAction:view_user')->name('user.view');
    Route::get('delete/{id}', 'UserController@delete')->middleware('hasPermission:delete_user', 'userAction:delete_user')->name('user.delete');
    Route::post('/', 'UserController@update')->middleware('hasPermission:update_user', 'userAction:update_user')->name('user.update');
});
