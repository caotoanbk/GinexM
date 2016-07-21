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
	public function sendEmail(Request $request)
	{
		$noidung = $request->get('yeucauemail');
		$id = $request->get('id');
		$yclhang = Dntung::findOrFail($id);
		$from = Auth::user();
		$subject = '';
		if($from->type ==1){
			$subject = 'Yeu cau tu thu ky';
		}
		if($from->type ==2){
			$subject = 'Yeu cau tu giam doc';
		}
		if($from->type ==3){
			$subject = 'Yeu cau tu phu trach bo phan';
		}
		$to = User::findOrFail($yclhang->user_id);
		$data = ['noidung' => $noidung, 'yclhang' => $yclhang, 'from' => $from, 'to' => $to];
		Mail::send('emails.welcom', $data, function($message) use ($from, $to, $subject){
			$message->from($from->email, $from->name);
			$message->to($to->email)->subject('[GinexM]'.$subject);
		});
		return redirect()->back()->with('flash_message', 'Email sent successfully!');
	}
}
