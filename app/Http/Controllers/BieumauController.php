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
		$arr = $request->get('arr') ? json_decode($request->get('arr')) : array();
		if(count($arr) == 0){
			$today = \Carbon\Carbon::today();
			$dntung = Dntung::where('created_at','>=',$today)->get();
			if(count($dntung)>0){
				return view('bieumau.denghitamung', compact('dntung'));
				//return "Khong co de nghi tam ung nao hom nay";
			}else{
				return 'Khong co de nghi tam ung nao.';
			}
		}else{
			$dntung = Dntung::find($arr);
			if(!is_null($dntung)){
				return view('bieumau.denghitamung', compact('dntung'));
				//return "Khong co de nghi tam ung nao hom nay";
			}else{
				return 'Khong co de nghi tam ung nao.';
			}
		}

	}
}
