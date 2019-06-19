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
    return view('sections.home');
});

Route::get('/new-form', function () {
    return view('sections.form');
})->name('newform');



Route::post('/only-validate-form', 'FormsController@only_validate_form')->name('only_validate_form');
Route::post('/get-filter-data', 'FormsController@get_filter_data')->name('get_filter_data');

Route::resource('forms','FormsController');