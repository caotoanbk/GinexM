<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\YclhangRequest;
use App\Yclhang;
use App\Dntung;

class ProponentController extends Controller
{
	public function storeYclhang(Request $request)
	{
		if(!$request->ajax())
			return redirect('/');
		if(!$request->input('bill'))
			abort(403);
		$input=$request->all();
		$input['ttien']=str_replace('.','', $input['ttien']);
		$yc = \Auth::user()->dntung()->create($input)->save();
		if($yc){
			return 'success';
		}
		abort(403);

	}
}
