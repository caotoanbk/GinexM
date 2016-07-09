<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Dntung;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
	public function sendEmailFromSecrectary(Request $request)
	{
		$noidung = $request->get('yeucauemail');
		$id = $request->get('id');
		$yclhang = Dntung::findOrFail($id);
		$from = Auth::user();
		$to = User::findOrFail($yclhang->user_id);
		$data = ['noidung' => $noidung, 'yclhang' => $yclhang, 'from' => $from, 'to' => $to];
		Mail::send('emails.welcom', $data, function($message) use ($data){
			$message->from('logistics@ginex.com.vn', 'test');
			$message->to($data['to']->email)->subject('[GinexM]Yeu cau tu thu ky');
		});
	}
}
