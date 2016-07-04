<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dntung;
use App\User;
use Datatables;
use Carbon\Carbon;
use App\Quyettoan;
use App\QTCont;


class DatatablesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function khlhang_home()
	{
		$yclhangs = Dntung::select(['id', 'user_id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done', 'ndonghang', 'ttien_ltron', 'nyeucau', 'ngiaohang', 'nnhanhang', 'khachhang', 'tuyenduong', 'loaihang'])->where('done', false)->where('user_id', \Auth::user()->id);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$check=$yclhang->check;
			if($check){
				return '<small class="text-warning"><em>Giám đốc chưa duyệt</em></small>';
			}
			return '<small class="text-muted"><em>Kế toán chưa kiểm tra</em></small>';	
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function dntung_home()
	{
		$yclhangs = Dntung::select(['id', 'user_id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done', 'ndonghang', 'ttien_ltron', 'nyeucau', 'ngiaohang', 'nnhanhang', 'khachhang', 'tuyenduong', 'loaihang'])->where('approve', false)->where('user_id', \Auth::user()->id);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$check=$yclhang->check;
			if($check){
				return '<small class="text-warning"><em>Giám đốc chưa duyệt</em></small>';
			}
			return '<small class="text-muted"><em>Kế toán chưa kiểm tra</em></small>';	
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function tuclhang_home()
	{
		$yclhangs = Dntung::select(['id', 'user_id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done', 'ndonghang', 'ttien_ltron', 'nyeucau', 'ngiaohang', 'nnhanhang', 'loaihang', 'khachhang', 'tuyenduong'])->where('approve', true)->where('user_id', '=', \Auth::user()->id)->where('ndonghang', '>=', Carbon::now());
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$ngaydonghang= new Carbon($yclhang->ndonghang);
			$now = Carbon::now();
			$difference = $ngaydonghang->diff($now)->days;
			switch($difference){
				case 0:
					return '<span class="text-danger"><i>Hôm nay đóng hàng</i></span>';
				case 1:
					return '<span class="text-primary"><i>Mai đóng hàng</i></span>';
				default: 
					return '<span class="text-primary"><i>Còn '.$difference.' ngày</i></span>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function tucqtoan_home()
	{
		$yclhangs = Dntung::select(['id', 'user_id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done', 'ndonghang', 'ttien_ltron', 'nyeucau', 'ngiaohang', 'nnhanhang', 'loaihang', 'khachhang', 'tuyenduong'])->where('user_id', \Auth::user()->id)->where('approve', true)->where('done', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			if(Carbon::now()->gt(Carbon::createFromFormat('Y-m-d', $yclhang->tghung))){
				return '<small class="text-danger"><em><a id="qhan" href="/quyet-toan-lam-hang/'.$yclhang->id.'">Qúa hạn quyết toán</a></em></small>';
			} else {
				return '<small class="text-primary"><em><a href="/quyet-toan-lam-hang/'.$yclhang->id.'">Chưa quyết toán</a></em></small>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function tudhthanh_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done', 'ndonghang', 'ttien_ltron', 'nyeucau', 'ngiaohang', 'nnhanhang', 'loaihang', 'tuyenduong', 'khachhang'])->where('user_id', \Auth::user()->id)->where('done', true);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			return '<small class="text-success"><em><a class="text-success" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Đã hoàn thành</a></em></small>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function sec_tuchthanh_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong'])->where('approve', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$check=$yclhang->check;
			if($check){
				return '<small class="text-warning"><em>Giám đốc chưa duyệt</em></small>';
			}
			return '<a href="#" class="kiemtra" data-id="'.$yclhang->id.'"><em><small>Chưa kiểm tra</small></em></a>';

		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->addColumn('ndenghi', function($yclhang){ return User::findOrFail($yclhang->user_id)->name;})->make(true);
	}
	public function sec_tuclhang_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.nang', 'dntungs.ndonghang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ttien_ltron', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong'])->where('approve', true)->where('dntungs.ndonghang', '>=', Carbon::now());
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$ngaydonghang= new Carbon($yclhang->ndonghang);
			$now = Carbon::now();
			$difference = $ngaydonghang->diff($now)->days;
			switch($difference){
				case 0:
					return '<span class="text-danger"><i>Hôm nay đóng hàng</i></span>';
				case 1:
					return '<span class="text-primary"><i>Mai đóng hàng</i></span>';
				default: 
					return '<span class="text-primary"><i>Còn '.$difference.' ngày</i></span>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);

	}
	public function sec_tucqtoan_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong'])->where('approve', true)->where('done', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			if(Carbon::now()->gt(Carbon::createFromFormat('Y-m-d', $yclhang->tghung))){
				return '<small class="text-danger"><em><a id="qhan" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Qúa hạn quyết toán</a></em></small>';
			} else {
				return '<small class="text-primary"><em><a href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Chưa quyết toán</a></em></small>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function sec_tudhthanh_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong'])->where('done', true);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-default">View</a>';	
		})->addColumn('status', function($yclhang){
			$done=$yclhang->done;
				return '<small class="text-success"><em><a class="text-success" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Đã hoàn thành</a></em></small>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_tucduyet_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.nyeucau', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong'])->where('approve', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			return '<a href="#" class="duyet" data-id="'.$yclhang->id.'"><em><small>Chưa duyệt</small></em></a>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_tucqtoan_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.ttien_ltron', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong'])->where('approve', true)->where('done', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			if(Carbon::now()->gt(Carbon::createFromFormat('Y-m-d', $yclhang->tghung))){
				return '<small class="text-danger"><em><a id="qhan" href="/quyet-toan-lam-hang-director/'.$yclhang->id.'">Qúa hạn quyết toán</a></em></small>';
			} else {
				return '<small class="text-primary"><em><a href="/quyet-toan-lam-hang-director/'.$yclhang->id.'">Chưa quyết toán</a></em></small>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_tudhthanh_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong'])->where('done', true);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
				return '<small class="text-success"><em><a class="text-success" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Đã hoàn thành</a></em></small>'; })->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_tuclhang_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.nang', 'dntungs.ndonghang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ttien_ltron', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong'])->where('approve', true)->where('dntungs.ndonghang', '>=', Carbon::now());
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$ngaydonghang= new Carbon($yclhang->ndonghang);
			$now = Carbon::now();
			$difference = $ngaydonghang->diff($now)->days;
			switch($difference){
				case 0:
					return '<span class="text-danger"><i>Hôm nay đóng hàng</i></span>';
				case 1:
					return '<span class="text-primary"><i>Mai đóng hàng</i></span>';
				default: 
					return '<span class="text-primary"><i>Còn '.$difference.' ngày</i></span>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);

	}
	public function tongkethangmuc($year, $month)
	{
		$str_month = strval($month);
		$str_year = strval($year);
		$ym = $str_year.'-'.$str_month.'-';
		$dulieus = Quyettoan::join('dntungs', 'quyettoans.dntung_id', '=', 'dntungs.id')->select(['quyettoans.nchi', 'quyettoans.ldo', 'dntungs.slc20', 'dntungs.slc40', 'dntungs.lcont', 'dntungs.khang', 'dntungs.bill', 'quyettoans.stien', 'quyettoans.hdon', 'quyettoans.nphanh', 'quyettoans.gchu', 'dntungs.date_done'])->where('dntungs.done', true)->where('dntungs.date_done', 'LIKE', $ym.'%');
		return Datatables::of($dulieus)->addColumn('tongcont', function($dlieu){return $dlieu->slc20+$dlieu->slc40;})->addColumn('tienchuaVAT', function($dlieu){return round($dlieu->stien/1.1);})->addColumn('VAT', function($dulieu){return round($dulieu->stien/1.1*0.1);})->addColumn('qtoancty', function($dulieu){return $dulieu->stien;})->make(true);
	}
	public function tongketbooking($year, $month)
	{
		$str_month = strval($month);
		$str_year = strval($year);
		$ym = $str_year.'-'.$str_month.'-';
		$dulieus = QTCont::join('dntungs', 'q_t_conts.dntung_id', '=', 'dntungs.id')->select(['dntungs.khang', 'q_t_conts.nxchay', 'q_t_conts.bsxe', 'dntungs.loaihang', 'dntungs.tuyenduong', 'dntungs.khachhang', 'q_t_conts.lxe', 'q_t_conts.scont', 'q_t_conts.ccont', 'q_t_conts.nxe', 'q_t_conts.lcont', 'dntungs.bill', 'q_t_conts.pnha', 'q_t_conts.khquan', 'q_t_conts.cxe', 'q_t_conts.cgui', 'q_t_conts.cmua', 'q_t_conts.gvcVAT', 'q_t_conts.cbcVAT', 'q_t_conts.gvdchinh'])->where('dntungs.done', true)->where('dntungs.date_done', 'LIKE', $ym.'%');
		return Datatables::of($dulieus)->addColumn('pnhaVAT', function($dulieu){return round($dulieu->pnha*0.1);})->addColumn('VATgvon', function($dulieu){return round($dulieu->gvcVAT*0.1);})->addColumn('VATgvdchinh', function($dulieu){return round($dulieu->gvdchinh*0.1);})->addColumn('lngop1', function($dulieu){return ($dulieu->cbcVAT - $dulieu->gvcVAT);})->addColumn('lngop2', function($dulieu){return ($dulieu->cbcVAT -$dulieu->gvdchinh);})->addColumn('mschuyen', function($dulieu){return 'ma so chuyen';})->make(true);
	}
}
