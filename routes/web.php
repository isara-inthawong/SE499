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

Route::get('/', function () {
    return view('welcome');
});

Route::get('sweet', 'admin\TestController@alert')->name('sweet.alert');
//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
//Route for admin
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/home', 'admin\AdminController@index')->name('admin.home');
        Route::get('/linenotify', 'admin\LineNotifyController@index')->name('linenotify.index');
        Route::post('/linenotify', 'admin\LineNotifyController@sent')->name('linenotify.sent');
        Route::resource('/activity', 'admin\ActivityController');
    });
});


Auth::routes();
