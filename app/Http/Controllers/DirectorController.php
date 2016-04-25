<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DirectorController extends Controller
{
	public function duyet(Request $request)
	{

		$id = $request->get('id');
		if($id == null){
			return 'null';
		}else{
			$dntung = \App\Dntung::findOrFail($id);
			$dntung->approve = true;
			$dntung->save();
			return 'Success';
		}
	}
	public function hoanthanh()
	{
		return 'success';
	}
}
