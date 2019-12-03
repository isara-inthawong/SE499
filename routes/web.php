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

Auth::routes();


//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/LineNotify', 'LineNotifyController@index')->name('LineNotify.index');
    Route::post('/LineNotify', 'LineNotifyController@sent')->name('LineNotify.sent');
    Route::get('/activity', 'admin\ActivityController@index')->name('Activity.index');
    Route::post('/activity', 'admin\ActivityController@store')->name('Activity.store');
});
//Route for admin
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', 'admin\AdminController@index')->name('dashboard');
        // Route::get('/LineNotify', 'admin\LineNotifyController@index')->name('LineNotify.index');
        // Route::post('/LineNotify', 'admin\LineNotifyController@sent')->name('LineNotify.sent');
        // Route::get('/activity', 'admin\ActivityController@index')->name('Activity.index');
    });
});
