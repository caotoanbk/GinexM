<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\YclhangRequest;
use App\Yclhang;
use App\Dntung;

class ProponentController extends Controller
{
	public function storeYclhang(YclhangRequest $request)
	{
		$my=date("Y/m");
		$input=$request->all();
		$input['ttien']=str_replace('.','', $input['ttien']);
		$input['cuoc']=str_replace('.','', $input['cuoc']);
		$input['nang']=str_replace('.','', $input['nang']);
		$input['ha']=str_replace('.', '', $input['ha']);
		$input['hquan']=str_replace('.', '', $input['hquan']);
		$input['psinh']=str_replace('.', '', $input['psinh']);
		$input['user_id']=\Auth::user()->id;	
		$yc= new Dntung($input);
		$yc->save();
		$fileName = $yc->id.'.'.$request->file('bke')->getClientOriginalExtension();
		$request->file('bke')->move(base_path().'/public/de_nghi_tam_ung/'.$my.'/', $fileName);
		return redirect('/home');

	}
}
