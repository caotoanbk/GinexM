<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dntung;

class BieumauController extends Controller
{
	public function phieuchi($id)
	{
		$dntung=Dntung::findOrFail($id);
		$dntung->check=true;
		$dntung->save();
		return view('bieumau.phieuchi', compact('dntung'));
	}
	public function denghitamung(Request $request)
	{
		dd($request->all());
		$today = \Carbon\Carbon::today();
		$dntung = Dntung::where('created_at','>=',$today)->get();
		if(!is_null($dntung)){
			return view('bieumau.denghitamung', compact('dntung'));
		}else{
			return 'Khong co de nghi tam ung nao.';
		}

	}
}
