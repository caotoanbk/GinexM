<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\YclhangRequest;
use App\Yclhang;

class ProponentController extends Controller
{
	public function storeYclhang(Request $request)
	{
		if(!$request->ajax())
			return redirect('/');
		if(!$request->input('bill'))
			abort(403);
		$yc = \Auth::user()->yclhang()->create($request->all())->save();
		if($yc){
			return 'success';
		}
		abort(403);

	}
}
