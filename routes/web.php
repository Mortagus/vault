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
    return view('home.welcome');
})->name('home');

Route::group(['prefix' => 'projects'], function() {
    Route::get('/', 'ProjectController@index')->name('projects');
    Route::get('/tetris', 'TetrisController@index')->name('tetris');

    Route::group(['prefix' => 'contest'], function() {
        Route::get('index', 'ContestController@index')->name('contest-index');
        Route::get('show/{id}', 'ContestController@show')->where('id', '[0-9]+')->name('contest-show');
    });

    Route::group(['prefix' => 'random'], function() {
        Route::get('/', 'RandomController@index')->name('random');
        Route::post('/{folderPath?}', 'RandomController@index')->name('refresh-movies');
    });
});

Route::group(['prefix' => 'practices'], function() {
    Route::get('/', 'PracticeController@index')->name('practices');
    Route::get('flex', 'FlexController@index')->name('flex-index');
    Route::get('bootstrap', 'BootstrapController@index')->name('bootstrap_ex-index');
    Route::get('jquery', 'JqueryController@index')->name('jquery_ex-index');
});