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
use Carbon\Carbon;

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
		//$input['ttien']=str_replace('.','', $input['ttien']);
		//$input['ttien_ltron']=str_replace('.','', $input['ttien_ltron']);
		//$input['cuoc']=str_replace('.','', $input['cuoc']);
		//$input['nang']=str_replace('.','', $input['nang']);
		//$input['ha']=str_replace('.', '', $input['ha']);
		//$input['hquan']=str_replace('.', '', $input['hquan']);
		//$input['psinh']=str_replace('.', '', $input['psinh']);
		$input['user_id']=\Auth::user()->id;	
		$yc= new Dntung($input);
		$yc->save();
		$filebooking = $yc->id . '.' . $request->file('filebooking')->getClientOriginalExtension();
		$request->file('filebooking')->move(base_path() . '/public/de_nghi_tam_ung/', $filebooking);
		\Session::flash('flash_message', 'Dang thong tin yeu cau lam hang thanh cong');
		if(Auth::user()->type == 0)
			return redirect('/proponent/ke-hoach-lam-hang');
		return redirect('/director/ke-hoach-lam-hang');

	}
	public function tamung($id)
	{
		$dntu = Dntung::findOrFail($id);
		return view('user.proponent.tamung', compact('dntu'));

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
		$dntu = Dntung::findOrFail($id);
		$dntu->denghiquyettoan = false;
		$dntu->save();
		$nchay = $request->input('nchay');
		$scont = $request->input('scont');
		$sochi = $request->input('sochi');
		$ccont = $request->input('ccont');
		$lcont = $request->input('lcont');
		$bainang = $request->input('bainang');
		$baiha = $request->input('baiha');
		$trongluong = $request->input('trongluong');
		$dieuxe = $request->input('dieuxe');
		$lxe = $request->input('lxe');
		$bsxe = $request->input('bsxe');
		$diadiemdongtrahang = $request->input('diadiemdongtrahang');
		$phinangchuaVAT = $request->input('phinangchuaVAT');
		$VATphinang	= $request->input('VATphinang');
		$sohoadonnang	= $request->input('sohoadonnang');
		$nxuathoadonnang	= $request->input('nxuathoadonnang');
		$dvicaphoadonnang	= $request->input('dvicaphoadonnang');
		$phihachuaVAT = $request->input('phihachuaVAT');
		$VATphiha	= $request->input('VATphiha');
		$sohoadonha	= $request->input('sohoadonha');
		$nxuathoadonha	= $request->input('nxuathoadonha');
		$dvicaphoadonha	= $request->input('dvicaphoadonha');
		$boctokhai	= $request->input('boctokhai');
		$hquantiepnhan	= $request->input('hquantiepnhan');
		$hquangiamsat = $request->input('hquangiamsat');
		$hquankiemhoa = $request->input('hquankiemhoa');
		$cuoccont = $request->input('cuoccont');
		$llenhhangtau = $request->input('llenhhangtau');
		$luucont = $request->input('luucont');
		$luubai = $request->input('luubai');
		$phivesinh = $request->input('phivesinh');
		$phicatday = $request->input('phicatday');
		$boctem = $request->input('boctem');
		$kddtvchuaVAT= $request->input('kddtvchuaVAT');
		$VATkddtv= $request->input('VATkddtv');
		$phingoaikddtv= $request->input('phingoaikddtv');
		$cackhoankhacchokhach=$request->input('cackhoankhacchokhach');
		$tong=$request->input('tong');
		$ghichu=$request->input('ghichu');
		for ($i = 0; $i < count($nchay); $i++) {
			$qtcont = new QTCont;
			$qtcont->dntung_id = $id;
			$qtcont->nxchay = $nchay[$i];
			$qtcont->scont = $scont[$i];
			$qtcont->sochi = $sochi[$i];
			$qtcont->ccont = $ccont[$i];
			$qtcont->lcont = $lcont[$i];
			$qtcont->bainang = $bainang[$i];
			$qtcont->baiha = $baiha[$i];
			$qtcont->trongluong = $trongluong[$i];
			$qtcont->dieuxe = $dieuxe[$i];
			$qtcont->lxe = $lxe[$i];
			$qtcont->bsxe = $bsxe[$i];
			$qtcont->diadiemdongtrahang = $diadiemdongtrahang[$i];
			$qtcont->phinangchuaVAT = $this->convert($phinangchuaVAT[$i]);
			$qtcont->VATphinang = $this->convert($VATphinang[$i]);
			$qtcont->sohoadonnang = $sohoadonnang[$i];
			$qtcont->nxuathoadonnang = $nxuathoadonnang[$i];
			$qtcont->dvicaphoadonnang = $dvicaphoadonnang[$i];
			$qtcont->phihachuaVAT = $this->convert($phihachuaVAT[$i]);
			$qtcont->VATphiha = $this->convert($VATphiha[$i]);
			$qtcont->sohoadonha = $sohoadonha[$i];
			$qtcont->nxuathoadonha = $nxuathoadonha[$i];
			$qtcont->dvicaphoadonha = $dvicaphoadonha[$i];
			$qtcont->boctokhai = $this->convert($boctokhai[$i]);
			$qtcont->hquantiepnhan = $this->convert($hquantiepnhan[$i]);
			$qtcont->hquangiamsat = $this->convert($hquangiamsat[$i]);
			$qtcont->hquankiemhoa = $this->convert($hquankiemhoa[$i]);
			$qtcont->cuoccont = $this->convert($cuoccont[$i]);
			$qtcont->llenhhangtau = $this->convert($llenhhangtau[$i]);
			$qtcont->luucont = $this->convert($luucont[$i]);
			$qtcont->luubai = $this->convert($luubai[$i]);
			$qtcont->phivesinh = $this->convert($phivesinh[$i]);
			$qtcont->phicatday = $this->convert($phicatday[$i]);
			$qtcont->boctem = $this->convert($boctem[$i]);
			$qtcont->kddtvchuaVAT = $this->convert($kddtvchuaVAT[$i]);
			$qtcont->VATkddtv = $this->convert($VATkddtv[$i]);
			$qtcont->phingoaikddtv = $this->convert($phingoaikddtv[$i]);
			$qtcont->cackhoankhacchokhach = $this->convert($cackhoankhacchokhach[$i]);
			$qtcont->tong = $this->convert($tong[$i]);
			$qtcont->ghichu = $ghichu[$i];
			$qtcont->save();
		}
		//chi phi phat sinh
		$ldo = $request->input('ldo');
		$dvtinh = $request->input('dvtinh');
		$soluong = $request->input('soluong');
		$dongia = $request->input('dongia');
		$stien = $request->input('stien');
		$VAT = $request->input('VAT');
		$tong = $request->input('tong');
		$hdon = $request->input('hdon');
		$nphanh = $request->input('nphanh');
		$ccho = $request->input('ccho');
		$nchi = $request->input('nchi');
		$gchu = $request->input('gchu');
		for ($i = 0; $i < count($ldo); $i++) {
			$qtoan = new Quyettoan;
			$qtoan->dntung_id = $id;
			$qtoan->ldo = $ldo[$i];
			$qtoan->dvtinh = $dvtinh[$i];
			$qtoan->soluong = $soluong[$i];
			$qtoan->dongia = $this->convert($dongia[$i]);
			$qtoan->stien = $this->convert($stien[$i]);
			$qtoan->VAT = $this->convert($VAT[$i]);
			$qtoan->tong = $this->convert($tong[$i]);
			$qtoan->hdon = $hdon[$i];
			$qtoan->nphanh = $nphanh[$i];
			$qtoan->chicho = $ccho[$i];
			$qtoan->nchi = $nchi[$i];
			$qtoan->gchu = $gchu[$i];
			$qtoan->save();
		}
		return redirect('/quyet-toan-lam-hang/'.$id);
	}
	public function updateQTCont($id, Request $request)
	{
		$data = $request->all();
		$input=$data['result'];
		$qtcont = QTCont::findOrFail($id);
		$qtcont->fill($input)->save();
		return $input;
	}
	public function updateQTKH($id, Request $request)
	{
		$data = $request->all();
		$input=$data['result'];
		$qt = Quyettoan::findOrFail($id);
		$qt->fill($input)->save();
		return $input;
	}
	public function denghiquyettoan($id)
	{
		$dntu = Dntung::findOrFail($id);
		$dntu->denghiquyettoan = true;
		$dntu->save();
		return 'success';
	}
	public function huydenghiquyettoan($id)
	{
		$dntu = Dntung::findOrFail($id);
		$dntu->denghiquyettoan = false;
		$dntu->save();
		return 'success';
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
	public function yeucautamung($id, Request $request)
	{
		$dntu = Dntung::findOrFail($id);
		$input = $request->all();
		$input['ttien']=str_replace('.','', $input['ttien']);
		$input['ttien_ltron']=str_replace('.','', $input['ttien_ltron']);
		$input['cuoc']=str_replace('.','', $input['cuoc']);
		$input['playlenh']=str_replace('.','', $input['playlenh']);
		$input['nang']=str_replace('.','', $input['nang']);
		$input['ha']=str_replace('.', '', $input['ha']);
		$input['pbtokhai']=str_replace('.', '', $input['pbtokhai']);
		$input['phqtiepnhan']=str_replace('.', '', $input['phqtiepnhan']);
		$input['hquan']=str_replace('.', '', $input['hquan']);
		$input['pitokhai']=str_replace('.', '', $input['pitokhai']);
		$input['pkddongvat']=str_replace('.', '', $input['pkddongvat']);
		$input['pkdthucvat']=str_replace('.', '', $input['pkdthucvat']);
		$input['psinh']=str_replace('.', '', $input['psinh']);
		$dntu->fill($input)->save();
		\Session::flash('flas_message', 'Yeu cau tạm ứng thành công!');
		return redirect('/proponent/de-nghi-tam-ung');

	}
	public function testdate()
	{
		return Carbon::now();
	}
	public function processUpdate_dntu($id, Request $request)
	{
		$dntu = Dntung::findOrFail($id);
		$dntu->check = false;
		$dntu->approve = false;
		$dntu->lamhang = false;
		$dntu->done = false;
		$input = $request->all();
		$dntu->fill($input)->save();
		$filebooking = $dntu->id . '.' . $request->file('filebooking')->getClientOriginalExtension();
		$request->file('filebooking')->move(base_path() . '/public/de_nghi_tam_ung/', $filebooking);
		\Session::flash('flas_message', 'Cập nhật đề nghị tạm ứng thành công!');
		return redirect('/');
	}
	public function tuclhang_index()
	{
		return view('user.proponent.tuclhang_home');
	}
}
