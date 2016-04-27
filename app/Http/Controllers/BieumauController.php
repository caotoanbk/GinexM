<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dntung;

class BieumauController extends Controller
{
	public function phieuchi(Request $request)
	{
		$arr = $request->get('arr') ? json_decode($request->get('arr')) : array();
		if(count($arr) == 0){
			$today = \Carbon\Carbon::today();
			$dntungs = Dntung::where('created_at','>=',$today)->get();
			if(count($dntungs)>0){
				foreach ($dntungs as $dntung){
					$dntung->check =true;
					$dntung->save();
				};
				return view('bieumau.phieuchi', compact('dntungs'));
			}else{
				return 'Khong co de nghi tam ung nao.';
			}
		}else{
			$dntungs = Dntung::findOrFail($arr);
			if(!is_null($dntungs)){
				foreach ($dntungs as $dntung){
					$dntung->check =true;
					$dntung->save();
				};
				return view('bieumau.phieuchi', compact('dntungs'));
			}else{
				return 'Khong co de nghi tam ung nao.';
			}
		}
	}
	public function phieuthu(Request $request)
	{
		$arr = $request->get('arr') ? json_decode($request->get('arr')) : array();
		if(count($arr) == 0){
			$today = \Carbon\Carbon::today();
			$dntungs = Dntung::where('created_at','>=',$today)->get();
			if(count($dntungs)>0){
				return view('bieumau.phieuthu', compact('dntungs'));
			}else{
				return 'Khong co de nghi tam ung nao.';
			}
		}else{
			$dntungs = Dntung::findOrFail($arr);
			if(!is_null($dntungs)){
				return view('bieumau.phieuthu', compact('dntungs'));
			}else{
				return 'Khong co de nghi tam ung nao.';
			}
		}
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
	public function checkdone(Request $request)
	{
		$arr = $request->get('arr') ? json_decode($request->get('arr')) : array();
		$dntungs = Dntung::find($arr);
		foreach($dntungs as $dntung){
			if($dntung->done == false)
				return 'not-done';
		}
		return 'ok';
	}
}
