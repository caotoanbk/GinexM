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
Route::get('/proponent/de-nghi-tam-ung', 'ProponentController@dntung_index');
Route::get('/proponent/tam-ung-chua-quyet-toan', 'ProponentController@tucqtoan_index');
Route::get('/proponent/tam-ung-da-hoan-thanh', 'ProponentController@tudhthanh_index');
Route::get('/yclhang/data', 'DatatablesController@yclhangData');
Route::get('/proponent/dntung/data', 'DatatablesController@dntung_home');
Route::get('/proponent/tucqtoan/data', 'DatatablesController@tucqtoan_home');
Route::get('/proponent/tudhthanh/data', 'DatatablesController@tudhthanh_home');
Route::post('/make-goods', 'ProponentController@storeYclhang');
Route::get('/test/', 'DatatablesController@test');
Route::get('/bieumau/phieuchi/{id}', 'BieumauController@phieuchi');
Route::get('/bieumau/denghitamung', 'BieumauController@denghitamung');
Route::get('/bieumau/phieuchi', 'BieumauController@phieuchi');
Route::get('/bieumau/phieuthu', 'BieumauController@phieuthu');
Route::get('/bieumau/thanhtoantamung', 'BieumauController@thanhtoantamung');
Route::get('/secrectary/data', 'DatatablesController@secrectaryData');
Route::get('/director/data', 'DatatablesController@directorData');
Route::get('/director/duyet', 'DirectorController@duyet');
Route::post('/quyet-toan/{id}', 'ProponentController@qtcont');
Route::get('/qt-tam-ung/{id}', 'ProponentController@qtoanData');
Route::get('/delete-quyet-toan-phat-sinh/{tuid}/{qtid}', 'ProponentController@deleteQtoan');
Route::get('/delete-quyet-toan-cont/{tuid}/{qtcid}', 'ProponentController@deleteQtoancont');
Route::post('/hoan-thanh/{id}', 'DirectorController@hoanthanh');
Route::get('/check-done', 'BieumauController@checkdone');
Route::get('/test', 'TestController@test');
Route::get('/quyet-toan-lam-hang/{id}', 'ProponentController@qtlhang');
Route::get('/quyet-toan-lam-hang-secrectary/{id}', 'SecrectaryController@qtlhang');
Route::get('/quyet-toan-lam-hang-director/{id}', 'DirectorController@qtlhang');
