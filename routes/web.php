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
    Route::resource('/my_profile', 'Member\ProfileController');
    Route::match(['put', 'patch', 'post'], '/my_profile', 'Member\ProfileController@update')->name('user-profile.update');

    Route::resource('join_activity', 'Member\JoinActivityController');
    Route::match(
        ['put', 'patch', 'post'],
        '/join_activity/{id}',
        'Member\JoinActivityController@update'
    )->name('joinActivity.update');

    // ประเมิน
    Route::resource('my_history', 'Member\HistoryController');
    Route::match(
        ['put', 'patch', 'post'],
        '/my_history/{id}',
        'Member\HistoryController@update'
    )->name('vote.update');
});
//Route for admin
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/home', 'Admin\AdminController@index')->name('admin.home');

        Route::get('/linenotify', 'Admin\LineNotifyController@index')->name('linenotify.index');
        Route::post('/linenotify', 'Admin\LineNotifyController@sent')->name('linenotify.sent');

        Route::resource('/activity', 'Admin\ActivityController');
        Route::match(
            ['put', 'patch', 'post'],
            '/activity/{id}',
            'Admin\ActivityController@update'
        )->name('activity.update');

        // เปิดแบบประเมิน
        Route::resource('join_activity', 'Admin\JoinActivityController');
        Route::match(
            ['put', 'patch', 'post'],
            '/join_activity/{id}',
            'Admin\JoinActivityController@update'
        )->name('join_activity.update');

        // ประเมิน
        Route::resource('history', 'Admin\HistoryController');
        Route::match(
            ['put', 'patch', 'post'],
            '/history/{id}',
            'Admin\HistoryController@update'
        )->name('vote.update');
        
        Route::get('all_history', 'Admin\HistoryController@index2')->name('all_history.index2');

        Route::resource('/users', 'Admin\UserController');
        Route::match(
            ['put', 'patch', 'post'],
            '/users/{id}',
            'Admin\UserController@update'
        )->name('users.update');

        Route::resource('/profile', 'Admin\ProfileController');
        Route::match(['put', 'patch', 'post'], '/profile', 'Admin\ProfileController@update')->name('profile.update');

        // Test
        // Route::get('sweet', 'Admin\TestController@alert')->name('sweet.alert');
        Route::get('/create_dummy_user', 'Admin\TestController@create_dummy_user');
        Route::get('/create_dummy_activity', 'Admin\TestController@create_dummy_activity');
    });
});


Auth::routes();
