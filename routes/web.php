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

Route::get('/', 'ViewsController@welcome');

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'Member\HomeController@index')->name('home');
    Route::resource('/profile', 'Member\ProfileController');
    Route::match(['put', 'patch', 'post'], '/profile', 'Member\ProfileController@update')->name('useer-profile.update');
});
//Route for admin
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/home', 'admin\AdminController@index')->name('admin.home');
        Route::get('/linenotify', 'admin\LineNotifyController@index')->name('linenotify.index');
        Route::post('/linenotify', 'admin\LineNotifyController@sent')->name('linenotify.sent');
        Route::resource('/activity', 'admin\ActivityController');
        Route::match(
            ['put', 'patch', 'post'],
            '/activity_update/{id}',
            'admin\ActivityController@update'
        )->name('activity-update.update');

        Route::resource('/users', 'admin\UserController');
        Route::resource('/profile', 'admin\ProfileController');
        Route::match(['put', 'patch', 'post'], '/profile', 'admin\ProfileController@update')->name('profile.update');

        // Test
        // Route::get('sweet', 'admin\TestController@alert')->name('sweet.alert');
        Route::get('/create_dummy_user', 'admin\TestController@create_dummy_user');
        Route::get('/create_dummy_activity', 'admin\TestController@create_dummy_activity');
    });
});


Auth::routes();
