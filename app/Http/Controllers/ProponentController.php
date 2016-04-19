<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\YclhangRequest;
use App\Yclhang;
use App\Dntung;
use App\Quyettoan;

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

	public function qtoan($id, Request $request)
	{
		$stclai = $request->get('stclai');
		$ldo = $request->input('ldo');
		$stien = $request->input('stien');
		$hdon = $request->input('hdon');
		$nchi = $request->input('nchi');
		for ($i = 0; $i < count($ldo); $i++) {
			$qtoan = new Quyettoan;
			$qtoan->dntung_id = $id;
			$qtoan->ldo = $ldo[$i];
			$qtoan->stclai = $stclai;
			$qtoan->stien = $stien[$i];
			$qtoan->hdon = $hdon[$i];
			$qtoan->nchi = $nchi[$i];
			$qtoan->save();
		}
	}
	public function qtoanData($id)
	{
		$dntu = Dntung::findOrFail($id);
		$qtoans = $dntu->qtoans->toArray();
		return $qtoans;
	}
}
