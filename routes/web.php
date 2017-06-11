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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/exam/{id}/{status}', 'HomeController@exam')->name('exam');
Route::get('/edit/{id}', 'HomeController@edit')->name('edit');
Route::get('/edit/student/{id}', 'HomeController@editStudent')->name('editStudent');
Route::get('/new/student', 'HomeController@newStudent')->name('newStudent');
Route::post('/update/student/{id}', 'HomeController@updateStudent')->name('updateStudent');

Auth::routes();

