<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/addpatient','clientcontroller@index');
Route::post('/addpatient','clientcontroller@add');
Route::get('/editpatient','clientcontroller@edit');
Route::delete('/delpatient','clientcontroller@delete');
Route::get('/getpatient','clientcontroller@show');
Route::put('/updatepatient','clientcontroller@update');
Route::get('edittashkhes','tashkhesController@edit');
Route::delete('deltashkhes','tashkhesController@destroy');
Route::put('updatetashkhes','tashkhesController@update');
Route::get('/addtashkhes','tashkhesController@index');
Route::post('addtashkhes','tashkhesController@create');

