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
		\Session::flash('flash_message', 'Dang thong tin yeu cau lam hang thanh cong');
		return redirect('/home');

	}

	public function qtoan($id, Request $request)
	{
		$stclai = 0;
		$ldo = $request->input('ldo');
		$stien = $request->input('stien');
		$hdon = $request->input('hdon');
		$nchi = $request->input('nchi');
		$ccho = $request->input('ccho');
		for ($i = 0; $i < count($ldo); $i++) {
			$qtoan = new Quyettoan;
			$qtoan->dntung_id = $id;
			$qtoan->ldo = $ldo[$i];
			$qtoan->stclai = $stclai;
			$qtoan->chicho = $ccho[$i];
			$qtoan->stien = str_replace('.','',$stien[$i]);
			$qtoan->hdon = $hdon[$i];
			$qtoan->nchi = $nchi[$i];
			$qtoan->save();
		}
	}
	public function qtoanData($id)
	{
		$dntu = Dntung::findOrFail($id);
		$qtoans = $dntu->qtoans->toArray();

		return ['qtoan' => $qtoans, 'dntung' => $dntu];
	}
	public function deleteQtoan($tuid, $qtid)
	{
		$dntung = Dntung::findOrFail($tuid);	
		$qtoan = $dntung->qtoans->find($qtid);
		$qtoan->delete();
	}
	public function qtlhang($id)
	{
		return view('user.proponent_qtoan');
	}
}
