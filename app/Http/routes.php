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
Route::get('/yclhang/data', 'DatatablesController@yclhangData');
Route::post('/make-goods', 'ProponentController@storeYclhang');
Route::get('/test/', 'DatatablesController@test');
Route::get('/bieumau/phieuchi/{id}', 'BieumauController@phieuchi');
Route::get('/bieumau/denghitamung', 'BieumauController@denghitamung');
Route::get('/secrectary/data', 'DatatablesController@secrectaryData');
Route::get('/director/data', 'DatatablesController@directorData');
Route::get('/director/duyet', 'DirectorController@duyet');
