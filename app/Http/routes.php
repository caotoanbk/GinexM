<?php
Route::get('/', function () {
    return view('welcome');
});
Route::auth();
Route::get('/proponent/de-nghi-tam-ung', 'ProponentController@dntung_index');
Route::get('/proponent/tam-ung-chua-quyet-toan', 'ProponentController@tucqtoan_index');
Route::get('/proponent/tam-ung-da-hoan-thanh', 'ProponentController@tudhthanh_index');
Route::get('/yclhang/data', 'DatatablesController@yclhangData');
Route::get('/proponent/dntung/data', 'DatatablesController@dntung_home');
Route::get('/proponent/tucqtoan/data', 'DatatablesController@tucqtoan_home');
Route::get('/proponent/tudhthanh/data', 'DatatablesController@tudhthanh_home');
Route::get('/secrectary/tam-ung-chua-hoan-thanh', 'SecrectaryController@sec_tuchthanh_index');
Route::get('/secrectary/tam-ung-da-hoan-thanh', 'SecrectaryController@sec_tudhthanh_index');
Route::get('/secrectary/tuchthanh/data', 'DatatablesController@sec_tuchthanh_home');
Route::get('/secrectary/tudhthanh/data', 'DatatablesController@sec_tudhthanh_home');
Route::get('/director/tam-ung-chua-duyet', 'DirectorController@direc_tucduyet_index');
Route::get('/director/tam-ung-chua-quyet-toan', 'DirectorController@direc_tucqtoan_index');
Route::get('/director/tam-ung-da-hoan-thanh', 'DirectorController@direc_tudhthanh_index');
Route::get('/director/tucduyet/data', 'DatatablesController@direc_tucduyet_home');
Route::get('/director/tucqtoan/data', 'DatatablesController@direc_tucqtoan_home');
Route::get('/director/tudhthanh/data', 'DatatablesController@direc_tudhthanh_home');
Route::get('/director/tong-ket-tam-ung-thang', 'DirectorController@tongketthang');
Route::post('/process/tongket', 'DirectorController@xulytongket');
Route::post('/make-goods', 'ProponentController@storeYclhang');
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
Route::get('/quyet-toan-lam-hang/{id}', 'ProponentController@qtlhang');
Route::get('/quyet-toan-lam-hang-secrectary/{id}', 'SecrectaryController@qtlhang');
Route::get('/quyet-toan-lam-hang-director/{id}', 'DirectorController@qtlhang');
Route::get('/tong-ket/hang-muc/data/{year}/{month}', 'DatatablesController@tongkethangmuc');
Route::get('/tong-ket/booking/data/{year}/{month}', 'DatatablesController@tongketbooking');
Route::get('/tam-ung/xoa/{id}', 'ProponentController@xoaDntung');
Route::get('/tam-ung/sua/{id}', 'ProponentController@capnhatDntung');
Route::patch('/dntu/cap-nhat/{id}', 'ProponentController@processUpdate_dntu');
Route::get('/secrectary/kiem-tra', 'SecrectaryController@kiemtra');
Route::get('sendmail', function(){
	$data = array(
		'name' => 'Learning Laravel',
	);
	Mail::send('emails.welcom', $data, function($message){
		$message->from('logistics@ginex.com.vn', 'Learning Laravel');
		$message->to('tony.cao@ginex.com.vn')->subject('Learning Laravel test email');
	});
}); 
Route::get('test', function()
{
    dd(Config::get('mail'));
});
