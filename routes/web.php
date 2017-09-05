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

Route::get('/tetris', 'TetrisController@index')->name('tetris');

Route::group(['prefix' => 'flex'], function() {
    Route::get('index', 'FlexController@index')
        ->name('flex-index');
});

Route::group(['prefix' => 'bootstrap_ex'], function() {
    Route::get('index', 'BootstrapController@index')
        ->name('bootstrap_ex-index');
});

Route::group(['prefix' => 'jquery_ex'], function() {
    Route::get('index', 'JqueryController@index')
        ->name('jquery_ex-index');
});

Route::group(['prefix' => 'contest'], function() {
    Route::get('index', 'ContestController@index')
        ->name('contest-index');
    Route::get('show/{id}', 'ContestController@show')
        ->where('id', '[0-9]+')
        ->name('contest-show');
});