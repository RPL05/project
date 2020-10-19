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

use App\Http\Controllers\BiodataController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'biodatas'], function(){
    Route::get('index', 'BiodataController@index')->name('backend.cv.index');
    Route::get('create', 'BiodataController@create')->name('backend.cv.create');
    Route::post('save', 'BiodataController@store')->name('biodata.save');
    Route::get('edit/{biodata}', 'BiodataController@edit')->name('backend.cv.edit');
    Route::patch('update/{biodata}', 'BiodataController@update')->name('backend.cv.update');
    Route::delete('delete/{biodata}', 'BiodataController@destroy')->name('backend.cv.delete');
    Route::get('show/{biodata}','BiodataController@show')->name('backend.cv.show');

    });

