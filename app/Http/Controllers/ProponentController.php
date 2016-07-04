<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\YclhangRequest;
use App\Yclhang;
use App\Dntung;
use App\Quyettoan;
use App\QTCont;
use Auth;

class ProponentController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}
	public function khlhang_index()
	{
		return view('user.proponent.khlhang_home');
	}
	public function dntung_index()
	{
		return view('user.proponent.dntung_home');
	}
	public function tucqtoan_index(){
		return view('user.proponent.tucqtoan_home');
	} 
	public function tudhthanh_index()
	{
		return view('user.proponent.tudhthanh_home');
	}
	public function storeYclhang(Request $request)
	{
		$input=$request->all();
		$input['ttien']=str_replace('.','', $input['ttien']);
		$input['ttien_ltron']=str_replace('.','', $input['ttien_ltron']);
		$input['cuoc']=str_replace('.','', $input['cuoc']);
		$input['nang']=str_replace('.','', $input['nang']);
		$input['ha']=str_replace('.', '', $input['ha']);
		$input['hquan']=str_replace('.', '', $input['hquan']);
		$input['psinh']=str_replace('.', '', $input['psinh']);
		$input['user_id']=\Auth::user()->id;	
		$yc= new Dntung($input);
		$yc->save();
		$filebooking = $yc->id . '.' . $request->file('filebooking')->getClientOriginalExtension();
		$request->file('filebooking')->move(base_path() . '/public/de_nghi_tam_ung/', $filebooking);
		\Session::flash('flash_message', 'Dang thong tin yeu cau lam hang thanh cong');
		if(Auth::user()->type == 0)
			return redirect('/proponent/de-nghi-tam-ung');
		return redirect('/director/tam-ung-chua-duyet');

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

	public function convert($value)
	{
		return str_replace('.', '', $value);
	}
	public function qtcont($id, Request $request)
	{
		$nchay = $request->input('nchay');
		$bsxe = $request->input('bsxe');
		$lxe = $request->input('lxe');
		$scont = $request->input('scont');
		$ccont = $request->input('ccont');
		$lcont = $request->input('lcont');
		$nxe = $request->input('nxe');
		$pnha = $request->input('pnha');
		$khquan = $request->input('khquan');
		$cxe = $request->input('cxe');
		$cgui = $request->input('cgui');
		$cmua = $request->input('cmua');
		$gvcVAT = $request->input('gvcVAT');
		$cbcVAT = $request->input('cbcVAT');
		$gvdchinh = $request->input('gvdchinh');
		for ($i = 0; $i < count($nchay); $i++) {
			$qtcont = new QTCont;
			$qtcont->dntung_id = $id;
			$qtcont->nxchay = $nchay[$i];
			$qtcont->bsxe = $bsxe[$i];
			$qtcont->lxe = $lxe[$i];
			$qtcont->scont = $scont[$i];
			$qtcont->ccont = $ccont[$i];
			$qtcont->lcont = $lcont[$i];
			$qtcont->nxe = $nxe[$i];
			$qtcont->pnha = $this->convert($pnha[$i]);
			$qtcont->khquan = $this->convert($khquan[$i]);
			$qtcont->cxe = $this->convert($cxe[$i]);
			$qtcont->cgui = $this->convert($cgui[$i]);
			$qtcont->cmua = $this->convert($cmua[$i]);
			$qtcont->gvcVAT = $this->convert($gvcVAT[$i]);
			$qtcont->cbcVAT = $this->convert($cbcVAT[$i]);
			$qtcont->gvdchinh = $this->convert($gvdchinh[$i]);
			$qtcont->save();
		}
		//chi phi phat sinh
		$ldo = $request->input('ldo');
		$stien = $request->input('stien');
		$hdon = $request->input('hdon');
		$nchi = $request->input('nchi');
		$nphanh = $request->input('nphanh');
		$ccho = $request->input('ccho');
		$gchu = $request->input('gchu');
		for ($i = 0; $i < count($ldo); $i++) {
			$qtoan = new Quyettoan;
			$qtoan->dntung_id = $id;
			$qtoan->ldo = $ldo[$i];
			$qtoan->chicho = $ccho[$i];
			$qtoan->stien = $this->convert($stien[$i]);
			$qtoan->hdon = $hdon[$i];
			$qtoan->nphanh = $nphanh[$i];
			$qtoan->nchi = $nchi[$i];
			$qtoan->gchu = $gchu[$i];
			$qtoan->save();
		}
		return redirect('/');
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
	public function deleteQtoancont($tuid, $qtcid)
	{
		$dntung = Dntung::findOrFail($tuid);
		$qtcont = $dntung->qtconts->find($qtcid);
		$qtcont->delete();
	}
	public function qtlhang($id)
	{
		$dntung = Dntung::findOrFail($id);
		$qtconts = $dntung->qtconts()->get()->toArray();
		$qtpsinh = $dntung->qtoans()->get()->toArray();
		return view('user.proponent_qtoan', compact('dntung', 'qtconts', 'qtpsinh'));
	}
	public function xoaDntung($id)
	{
		$dntu = Dntung::findOrFail($id);
		$dntu->delete();
		return redirect('/');
	}
	public function capnhatDntung($id)
	{
		$dntu = Dntung::findOrFail($id);
		return view('user.proponent.capnhat_dntu', compact('dntu', 'id'));
	}
	public function processUpdate_dntu($id, Request $request)
	{
		$dntu = Dntung::findOrFail($id);
		$dntu->check = false;
		$dntu->approve = false;
		$dntu->lamhang = false;
		$dntu->done = false;
		$input = $request->all();
		$input['ttien']=str_replace('.','', $input['ttien']);
		$input['ttien_ltron']=str_replace('.','', $input['ttien_ltron']);
		$input['cuoc']=str_replace('.','', $input['cuoc']);
		$input['nang']=str_replace('.','', $input['nang']);
		$input['ha']=str_replace('.', '', $input['ha']);
		$input['hquan']=str_replace('.', '', $input['hquan']);
		$input['psinh']=str_replace('.', '', $input['psinh']);
		$dntu->fill($input)->save();
		\Session::flash('flas_message', 'Cập nhật đề nghị tạm ứng thành công!');
		return redirect('/');
	}
	public function tuclhang_index()
	{
		return view('user.proponent.tuclhang_home');
	}
}
