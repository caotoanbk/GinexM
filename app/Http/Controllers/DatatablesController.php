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
		$yclhangs = Dntung::select(['id', 'user_id', 'stokhai', 'slcont', 'slchroi', 'slcnong', 'slclanh', 'hangtau', 'nhaxe', 'created_at', 'bill', 'slc20','slc40', 'khang', 'lcont', 'check', 'approve', 'done', 'ndonghang', 'nyeucau', 'ngiaohang', 'nnhanhang', 'khachhang', 'tuyenduong', 'loaihang', 'curator_check', 'file_extension', 'director_cancel_check', 'curator_cancel_check'])->where('done', false)->where('user_id', \Auth::user()->id);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.'.$yclhang->file_extension.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$check=$yclhang->curator_check;
			$approve = $yclhang->approve;
			$curator_cancel_check = $yclhang->curator_cancel_check;
			$director_cancel_check = $yclhang->director_cancel_check;
			if(!$check){
				if($curator_cancel_check){
					return '<small class="text-muted"><em><b>Bị hủy kiểm tra<b></em></small>';	
				}else{
					return '<small class="text-muted"><em><b>Chưa kiểm tra<b></em></small>';	
				}
			}
			if(!$approve){
				if($director_cancel_check){
					return '<small class="text-danger"><em><b>Giám đốc hủy duyệt</b></em></small>';
				}else{
					return '<small class="text-warning"><em><b>Giám đốc chưa duyệt</b></em></small>';
				}
			}
			if($check && $approve) return '<small class="text-success"><em><b>OK</b></em></small>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function dntung_home()
	{
		$yclhangs = Dntung::select(['id', 'user_id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'playlenh', 'nang', 'ha', 'pbtokhai', 'phqtiepnhan', 'hquan', 'pitokhai', 'pkddongvat', 'pkdthucvat', 'psinh', 'check', 'approve', 'done', 'ndonghang', 'ttien_ltron', 'nyeucau', 'ngiaohang', 'nnhanhang', 'khachhang', 'tuyenduong', 'loaihang', 'curator_check', 'file_extension', 'curator_check_tu', 'director_check_tu', 'secrectary_check_tu'])->where('done', false)->where('user_id', \Auth::user()->id);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.'.$yclhang->file_extension.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$ttien = $yclhang->ttien;
			$curator_check_tu = $yclhang->curator_check_tu;
			$director_check_tu = $yclhang->director_check_tu;
			$secrectary_check_tu = $yclhang->secrectary_check_tu;
			if($ttien==0){
				return '<small class="text-info"><em><b>Chưa yeu cau t/ư<b></em></small>';	
			}
			if(!$curator_check_tu){
				return '<small class="text-muted"><em><b>Chưa kiểm tra t/ư<b></em></small>';	
			}
			if(!$director_check_tu){
				return '<small class="text-warning"><em><b>Giám đốc chưa duyệt t/ư</b></em></small>';
			}
			if(!$secrectary_check_tu){
				return '<small class="text-warning"><em><b>Kế toán chưa k/t</b></em></small>';
			}
			if($curator_check_tu && $director_check_tu && $secrectary_check_tu) return '<small class="text-success"><em><b>Tam ung OK</b></em></small>';
			//$check=$yclhang->check;
			//if($check){
			//	return '<small class="text-warning"><em>Giám đốc chưa duyệt</em></small>';
			//}
			//return '<small class="text-muted"><em>Kế toán chưa kiểm tra</em></small>';	
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function tuclhang_home()
	{
		$yclhangs = Dntung::select(['id', 'user_id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'playlenh', 'pbtokhai', 'phqtiepnhan', 'pitokhai', 'pkddongvat', 'pkdthucvat', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done', 'ndonghang', 'ttien_ltron', 'nyeucau', 'ngiaohang', 'nnhanhang', 'loaihang', 'khachhang', 'tuyenduong', 'curator_check', 'file_extension'])->where('dntungs.curator_check', true)->where('dntungs.approve', true)->where('dntungs.curator_check_tu', true)->where('director_check_tu', true)->where('secrectary_check_tu', true)->where('done', false)->where('user_id', '=', \Auth::user()->id)->where('ndonghang', '>=', Carbon::today());
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.'.$yclhang->file_extension.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$ngaydonghang= new Carbon($yclhang->ndonghang);
			$now = Carbon::today();
			$difference = $ngaydonghang->diff($now)->days;
			switch($difference){
				case 0:
					return '<span class="text-danger"><i><b><small>Hôm nay đóng hàng<small></b></i></span>';
				case 1:
					return '<span class="text-primary"><i><b><small>Mai đóng hàng</small></b></i></span>';
				default: 
					return '<span class="text-primary"><i><b><small>Còn '.$difference.' ngày</small></b></i></span>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function tucqtoan_home()
	{
		$yclhangs = Dntung::select(['id', 'user_id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'playlenh', 'pbtokhai', 'phqtiepnhan', 'pitokhai', 'pkddongvat', 'pkdthucvat', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done', 'ndonghang', 'ttien_ltron', 'nyeucau', 'ngiaohang', 'nnhanhang', 'loaihang', 'khachhang', 'tuyenduong', 'curator_check', 'denghiquyettoan', 'file_extension'])->where('user_id', \Auth::user()->id)->where('curator_check', true)->where('approve', true)->where('curator_check_tu', true)->where('director_check_tu', true)->where('secrectary_check_tu', true)->where('done', false)->where('ttien_ltron', '>', 0);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.'.$yclhang->file_extension.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$denghiquyettoan = ($yclhang->denghiquyettoan?"(*)":"");
			if(Carbon::today()->gt(Carbon::createFromFormat('Y-m-d', $yclhang->tghung))){
				return '<small class="text-danger"><em><a id="qhan" href="/quyet-toan-lam-hang/'.$yclhang->id.'"><small><b>Qúa hạn quyết toán '.$denghiquyettoan.'</b></small></a></em></small>';
			} else {
				return '<small class="text-primary"><em><a href="/quyet-toan-lam-hang/'.$yclhang->id.'"><b>Chưa quyết toán'.$denghiquyettoan.'</b></a></em></small>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function tudhthanh_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'playlenh', 'pbtokhai', 'phqtiepnhan', 'pitokhai', 'pkddongvat', 'pkdthucvat', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done', 'ndonghang', 'ttien_ltron', 'nyeucau', 'ngiaohang', 'nnhanhang', 'loaihang', 'tuyenduong', 'khachhang'])->where('user_id', \Auth::user()->id)->where('done', true);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			return '<small class="text-success"><em><a class="text-success" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'"><b>Đã hoàn thành</b></a></em></small>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function sec_khlhang_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.stokhai', 'dntungs.slcont', 'dntungs.slchroi', 'dntungs.slcnong', 'dntungs.slclanh', 'dntungs.hangtau', 'dntungs.nhaxe','dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.lcont', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check', 'dntungs.file_extension', 'dntungs.curator_cancel_check', 'dntungs.director_cancel_check'])->where('done', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.'.$yclhang->file_extension.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$check=$yclhang->curator_check;
			$approve = $yclhang->approve;
			$curator_cancel_check = $yclhang->curator_cancel_check;
			$director_cancel_check = $yclhang->director_cancel_check;
			if(!$check){
				if($curator_cancel_check){
					return '<small class="text-muted"><em><b>Bi hủy kiểm tra<b></em></small>';	
				}else{
					return '<small class="text-muted"><em><b>Chưa kiểm tra<b></em></small>';	
				}
			}
			if(!$approve){
				if($director_cancel_check){
					return '<small class="text-danger"><em><b>Giám đốc hủy duyệt</b></em></small>';
				}else{
					return '<small class="text-warning"><em><b>Giám đốc chưa duyệt</b></em></small>';
				}
			}
			if($check && $approve) return '<small class="text-success"><em><b>OK</b></em></small>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function sec_tuchthanh_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check', 'dntungs.file_extension', 'dntungs.secrectary_check_tu', 'dntungs.director_check_tu', 'dntungs.curator_check_tu'])->where('curator_check_tu', true)->where('director_check_tu', true)->where('done', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.'.$yclhang->file_extension.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$secrectary_check_tu = $yclhang->secrectary_check_tu;
			$ttien = $yclhang->ttien;
			if($secrectary_check_tu)
				return '<em><small class="text-success"><b>Đã duyệt tạm ứng</b></small></em>';
			else
				return '<em><small class="text-warning"><b>Chưa duyệt tạm ứng</b></small></em>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->addColumn('ndenghi', function($yclhang){ return User::findOrFail($yclhang->user_id)->name;})->make(true);
	}
	public function sec_tuclhang_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ndonghang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ttien_ltron', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check', 'dntungs.secrectary_check_tu'])->where('dntungs.curator_check', true)->where('dntungs.approve', true)->where('dntungs.secrectary_check_tu', true)->where('done', false)->where('dntungs.ndonghang', '>=', Carbon::today());
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$ngaydonghang= new Carbon($yclhang->ndonghang);
			$now = Carbon::today();
			$difference = $ngaydonghang->diff($now)->days;
			switch($difference){
				case 0:
					return '<span class="text-danger"><i><small><b>Hôm nay đóng hàng</b></small></i></span>';
				case 1:
					return '<span class="text-primary"><i><small><b>Mai đóng hàng</b></small></i></span>';
				default: 
					return '<span class="text-primary"><i><small><b>Còn '.$difference.' ngày</b></small></i></span>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function sec_tucqtoan_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check', 'dntungs.denghiquyettoan', 'dntungs.secrectary_check_tu'])->where('dntungs.secrectary_check_tu', true)->where('curator_check', true)->where('approve', true)->where('dntungs.ttien_ltron', '>', 0)->where('done', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$denghiquyettoan = ($yclhang->denghiquyettoan?"(*)":"");
			if(Carbon::today()->gt(Carbon::createFromFormat('Y-m-d', $yclhang->tghung))){
				return '<small class="text-danger"><em><b><a id="qhan" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Qúa hạn quyết toán '.$denghiquyettoan.'</a></b></em></small>';
			} else {
				return '<small class="text-primary"><em><b><a href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'"><b>Chưa quyết toán '.$denghiquyettoan.'</b></a></b></em></small>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function sec_tudhthanh_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong'])->where('done', true);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-default">View</a>';	
		})->addColumn('status', function($yclhang){
				return '<small class="text-success"><em><a class="text-success" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'"><b>Đã hoàn thành</b></a></em></small>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function cur_khlhang_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.stokhai', 'dntungs.slcont', 'dntungs.slchroi', 'dntungs.slcnong', 'dntungs.slclanh', 'dntungs.hangtau', 'dntungs.nhaxe','dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.lcont', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check', 'dntungs.file_extension', 'dntungs.curator_cancel_check'])->where('done', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.'.$yclhang->file_extension.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$curator_check=$yclhang->curator_check;
			$curator_cancel_check=$yclhang->curator_cancel_check;
			if($curator_check){
				return '<small class="text-success"><em><b>Đã kiểm tra</b></em></small>';
			}else{
				if($curator_cancel_check){
					return '<em><small class="text-danger"><b>Hủy kiểm tra</b></small></em>';
				}else{
					return '<em><small class="text-warning"><b>Chưa kiểm tra</b></small></em>';
				}
			}

		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}

	public function cur_dntung_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check', 'dntungs.file_extension', 'dntungs.curator_check_tu'])->where('done', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.'.$yclhang->file_extension.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$ttien = $yclhang->ttien;
			$curator_check_tu = $yclhang->curator_check_tu;
			if($curator_check_tu)
				return '<em><small class="text-success"><b>Đã kiểm tra t/ư</b></small></em>';
			else
				return '<em><small class="text-warning"><b>Chưa kiểm tra t/ư</b></small></em>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->addColumn('ndenghi', function($yclhang){ return User::findOrFail($yclhang->user_id)->name;})->make(true);
	}
	public function cur_tuclhang_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ndonghang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ttien_ltron', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check', 'dntungs.secrectary_check_tu'])->where('dntungs.secrectary_check_tu', true)->where('dntungs.curator_check', true)->where('approve', true)->where('done', false)->where('dntungs.ndonghang', '>=', Carbon::today());
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$ngaydonghang= new Carbon($yclhang->ndonghang);
			$now = Carbon::today();
			$difference = $ngaydonghang->diff($now)->days;
			switch($difference){
				case 0:
					return '<span class="text-danger"><i><small><b>Hôm nay đóng hàng</b></small></i></span>';
				case 1:
					return '<span class="text-primary"><i><small><b>Mai đóng hàng</b></small></i></span>';
				default: 
					return '<span class="text-primary"><i><small><b>Còn '.$difference.' ngày</b></small></i></span>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function cur_tucqtoan_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check', 'dntungs.denghiquyettoan', 'dntungs.secrectary_check_tu'])->where('dntungs.secrectary_check_tu', true)->where('curator_check', true)->where('approve', true)->where('done', false)->where('dntungs.ttien', '>', 0);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$denghiquyettoan = ($yclhang->denghiquyettoan?"(*)":"");
			if(Carbon::today()->gt(Carbon::createFromFormat('Y-m-d', $yclhang->tghung))){
				return '<small class="text-danger"><em><b><a id="qhan" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Qúa hạn quyết toán '.$denghiquyettoan.'</a></b></em></small>';
			} else {
				return '<small class="text-primary"><em><b><a href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'"><b>Chưa quyết toán '.$denghiquyettoan.'</a></b></em></small>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function cur_tudhthanh_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong'])->where('done', true);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-default">View</a>';	
		})->addColumn('status', function($yclhang){
				return '<small class="text-success"><em><a class="text-success" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'"><b>Đã hoàn thành</b></a></em></small>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_khlhang_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.stokhai', 'dntungs.slcont', 'dntungs.slchroi', 'dntungs.slcnong', 'dntungs.slclanh', 'dntungs.hangtau', 'dntungs.nhaxe','dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.lcont', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.file_extension', 'dntungs.curator_check', 'dntungs.director_cancel_check'])->where('curator_check', true)->where('done', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.'.$yclhang->file_extension.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$approve=$yclhang->approve;
			$director_cancel_check=$yclhang->director_cancel_check;
			if($approve){
				return '<small class="text-success"><em><b>Đã duyệt</b></em></small>';
			}else{
				if($director_cancel_check){
					return '<em><small class="text-warning"><b>Hủy duyệt</b></small></em>';
				}else{
					return '<em><small class="text-warning"><b>Chưa duyệt</b></small></em>';
				}
			}

		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_dntung_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.nyeucau', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check', 'dntungs.file_extension', 'dntungs.curator_check_tu', 'dntungs.director_check_tu'])->where('dntungs.curator_check_tu', true)->where('dntungs.done', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.'.$yclhang->file_extension.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$ttien = $yclhang->ttien;
			$director_check_tu = $yclhang->director_check_tu;
			if($director_check_tu){
				return '<em><small class="text-success"><b>Đã duyệt t/ư</b></small></em>';
			}else{
				return '<em><small class="text-warning"><b>Chưa duyệt t/ư</b></small></em>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_tucqtoan_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.ttien_ltron', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check', 'dntungs.denghiquyettoan', 'dntungs.secrectary_check_tu'])->where('dntungs.secrectary_check_tu', true)->where('curator_check', true)->where('approve', true)->where('dntungs.ttien_ltron', '>', 0)->where('done', false);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$denghiquyettoan = ($yclhang->denghiquyettoan?"(*)":"");
			$tghung = Carbon::createFromFormat('Y-m-d', $yclhang->tghung);
			if($tghung){
				if(Carbon::today()->gt($tghung)){
					return '<small class="text-danger"><em><a id="qhan" href="/quyet-toan-lam-hang-director/'.$yclhang->id.'"><b>Qúa hạn quyết toán '.$denghiquyettoan.'</b></a></em></small>';
				} else {
					return '<small class="text-primary"><em><a href="/quyet-toan-lam-hang-director/'.$yclhang->id.'"><b>Chưa quyết toán '.$denghiquyettoan.'</b></a></em></small>';
				}
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_tudhthanh_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.ttien_ltron', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ndonghang', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check'])->where('curator_check', true)->where('approve', true)->where('done', true);
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
				return '<small class="text-success"><em><a class="text-success" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'"><b>Đã hoàn thành</b></a></em></small>'; })->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_tuclhang_home()
	{
		$yclhangs = Dntung::join('users', 'dntungs.user_id', '=', 'users.id')->select(['dntungs.id', 'dntungs.user_id', 'dntungs.created_at', 'dntungs.reason', 'dntungs.bill', 'dntungs.slc20','dntungs.slc40', 'dntungs.khang', 'dntungs.ttien', 'dntungs.lcont', 'dntungs.tghung', 'dntungs.cuoc', 'dntungs.playlenh', 'dntungs.pbtokhai', 'dntungs.phqtiepnhan', 'dntungs.pitokhai', 'dntungs.pkddongvat', 'dntungs.pkdthucvat', 'dntungs.nang', 'dntungs.ndonghang', 'dntungs.ha', 'dntungs.hquan', 'dntungs.psinh', 'dntungs.check', 'dntungs.approve', 'dntungs.done', 'users.name', 'dntungs.ttien_ltron', 'dntungs.nyeucau', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'dntungs.loaihang', 'dntungs.khachhang', 'dntungs.tuyenduong', 'dntungs.curator_check', 'dntungs.secrectary_check_tu'])->where('dntungs.secrectary_check_tu', true)->where('dntungs.curator_check', true)->where('approve', true)->where('dntungs.ttien', '>', 0)->where('done', false)->where('dntungs.ndonghang', '>=', Carbon::today());
		return Datatables::of($yclhangs)->addColumn('filebooking', function($yclhang){
			return '<a href="/de_nghi_tam_ung/'.$yclhang->id.'.pdf'.'". class="btn btn-xs btn-primary">View</a>';	
		})->addColumn('status', function($yclhang){
			$ngaydonghang= new Carbon($yclhang->ndonghang);
			$now = Carbon::today();
			$difference = $ngaydonghang->diff($now)->days;
			switch($difference){
				case 0:
					return '<span class="text-danger"><i><small><b>Hôm nay đóng hàng</b></small></i></span>';
				case 1:
					return '<span class="text-primary"><i><small><b>Mai đóng hàng</b></small></i></span>';
				default: 
					return '<span class="text-primary"><i><small><b>Còn '.$difference.' ngày</b></small></i></span>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);

	}
	public function tongkethangmuc($year, $month)
	{
		$str_month = strval($month);
		$str_year = strval($year);
		$ym = $str_year.'-'.$str_month.'-';
		$dulieus = Quyettoan::join('dntungs', 'quyettoans.dntung_id', '=', 'dntungs.id')->select(['dntungs.bill', 'quyettoans.ldo', 'quyettoans.dvtinh', 'quyettoans.soluong', 'quyettoans.dongia', 'quyettoans.stien', 'quyettoans.VAT', 'quyettoans.tong', 'quyettoans.gchu', 'dntungs.ndonghang'])->where('dntungs.done', true)->where('dntungs.ndonghang', 'LIKE', $ym.'%');
		return Datatables::of($dulieus)->addColumn('STT', function($dlieu){ return '';})->make(true);
	}
	public function tongketbooking($year, $month)
	{
		$str_month = strval($month);
		$str_year = strval($year);
		$ym = $str_year.'-'.$str_month.'-';
		$dulieus = QTCont::join('dntungs', 'q_t_conts.dntung_id', '=', 'dntungs.id')->select(['dntungs.user_id', 'dntungs.khang', 'dntungs.khachhang', 'dntungs.stokhai','dntungs.bill', 'q_t_conts.scont', 'q_t_conts.sochi', 'q_t_conts.ccont', 'q_t_conts.lcont', 'dntungs.hangtau',  'q_t_conts.bainang', 'q_t_conts.baiha', 'q_t_conts.trongluong', 'dntungs.nyeucau', 'dntungs.ndonghang', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'q_t_conts.dieuxe', 'q_t_conts.bsxe', 'q_t_conts.diadiemdongtrahang', 'dntungs.tuyenduong', 'q_t_conts.phinangchuaVAT', 'q_t_conts.VATphinang', 'q_t_conts.sohoadonnang', 'q_t_conts.nxuathoadonnang', 'q_t_conts.dvicaphoadonnang', 'q_t_conts.phihachuaVAT', 'q_t_conts.VATphiha', 'q_t_conts.sohoadonha', 'q_t_conts.nxuathoadonha', 'q_t_conts.dvicaphoadonha', 'q_t_conts.boctokhai', 'q_t_conts.hquantiepnhan', 'q_t_conts.hquangiamsat', 'q_t_conts.hquankiemhoa', 'q_t_conts.cuoccont', 'q_t_conts.llenhhangtau', 'q_t_conts.luucont', 'q_t_conts.luubai', 'q_t_conts.phivesinh', 'q_t_conts.phicatday', 'q_t_conts.boctem', 'q_t_conts.kddtvchuaVAT', 'q_t_conts.VATkddtv', 'q_t_conts.phingoaikddtv', 'q_t_conts.cackhoankhacchokhach', 'q_t_conts.tong', 'q_t_conts.ghichu', 'dntungs.ndonghang'])->where('dntungs.done', true)->where('dntungs.ndonghang', 'LIKE', $ym.'%');
		return Datatables::of($dulieus)->addColumn('ngaydonghang', function($dlieu){if($dlieu->khang=='Xuất') {return $dlieu->ndonghang;}else{return '';} })->addColumn('ngaydohang', function($dlieu){if($dlieu->khang=='Xuất') {return '';}else{return $dlieu->ndonghang;} })->addColumn('pnhaVAT', function($dulieu){return round($dulieu->pnha*0.1);})->addColumn('VATgvon', function($dulieu){return round($dulieu->gvcVAT*0.1);})->addColumn('VATgvdchinh', function($dulieu){return round($dulieu->gvdchinh*0.1);})->addColumn('lngop1', function($dulieu){return ($dulieu->cbcVAT - $dulieu->gvcVAT);})->addColumn('lngop2', function($dulieu){return ($dulieu->cbcVAT -$dulieu->gvdchinh);})->addColumn('mschuyen', function($dulieu){return '';})->addColumn('PIC', function($dlieu){ return User::findOrFail($dlieu->user_id)->name;})->make(true);
	}
	public function tongkethangmuc_proponent($year, $month)
	{
		$str_month = strval($month);
		$str_year = strval($year);
		$ym = $str_year.'-'.$str_month.'-';
		$dulieus = Quyettoan::join('dntungs', 'quyettoans.dntung_id', '=', 'dntungs.id')->select(['dntungs.user_id', 'dntungs.bill', 'dntungs.khachhang', 'quyettoans.ldo', 'quyettoans.dvtinh', 'quyettoans.soluong', 'quyettoans.dongia', 'quyettoans.stien', 'quyettoans.VAT', 'quyettoans.tong', 'quyettoans.gchu', 'dntungs.ndonghang'])->where('user_id', '=', \Auth::user()->id)->where('dntungs.done', true)->where('dntungs.ndonghang', 'LIKE', $ym.'%');
		return Datatables::of($dulieus)->addColumn('STT', function($dlieu){ return '';})->make(true);
	}
	public function tongketbooking_proponent($year, $month)
	{
		$str_month = strval($month);
		$str_year = strval($year);
		$ym = $str_year.'-'.$str_month.'-';
		$dulieus = QTCont::join('dntungs', 'q_t_conts.dntung_id', '=', 'dntungs.id')->select(['dntungs.user_id', 'dntungs.khang', 'dntungs.khachhang', 'dntungs.stokhai','dntungs.bill', 'q_t_conts.scont', 'q_t_conts.sochi', 'q_t_conts.ccont', 'q_t_conts.lcont', 'dntungs.hangtau',  'q_t_conts.bainang', 'q_t_conts.baiha', 'q_t_conts.trongluong', 'dntungs.nyeucau', 'dntungs.ndonghang', 'dntungs.ngiaohang', 'dntungs.nnhanhang', 'q_t_conts.dieuxe', 'q_t_conts.bsxe', 'q_t_conts.diadiemdongtrahang', 'dntungs.tuyenduong', 'q_t_conts.phinangchuaVAT', 'q_t_conts.VATphinang', 'q_t_conts.sohoadonnang', 'q_t_conts.nxuathoadonnang', 'q_t_conts.dvicaphoadonnang', 'q_t_conts.phihachuaVAT', 'q_t_conts.VATphiha', 'q_t_conts.sohoadonha', 'q_t_conts.nxuathoadonha', 'q_t_conts.dvicaphoadonha', 'q_t_conts.boctokhai', 'q_t_conts.hquantiepnhan', 'q_t_conts.hquangiamsat', 'q_t_conts.hquankiemhoa', 'q_t_conts.cuoccont', 'q_t_conts.llenhhangtau', 'q_t_conts.luucont', 'q_t_conts.luubai', 'q_t_conts.phivesinh', 'q_t_conts.phicatday', 'q_t_conts.boctem', 'q_t_conts.kddtvchuaVAT', 'q_t_conts.VATkddtv', 'q_t_conts.phingoaikddtv', 'q_t_conts.cackhoankhacchokhach', 'q_t_conts.tong', 'q_t_conts.ghichu', 'dntungs.ndonghang'])->where('user_id', '=', \Auth::user()->id)->where('dntungs.done', true)->where('dntungs.date_done', 'LIKE', $ym.'%');
		return Datatables::of($dulieus)->addColumn('ngaydonghang', function($dlieu){if($dlieu->khang=='Xuất') {return $dlieu->ndonghang;}else{return '';} })->addColumn('ngaydohang', function($dlieu){if($dlieu->khang=='Xuất') {return '';}else{return $dlieu->ndonghang;} })->addColumn('pnhaVAT', function($dulieu){return round($dulieu->pnha*0.1);})->addColumn('VATgvon', function($dulieu){return round($dulieu->gvcVAT*0.1);})->addColumn('VATgvdchinh', function($dulieu){return round($dulieu->gvdchinh*0.1);})->addColumn('lngop1', function($dulieu){return ($dulieu->cbcVAT - $dulieu->gvcVAT);})->addColumn('lngop2', function($dulieu){return ($dulieu->cbcVAT -$dulieu->gvdchinh);})->addColumn('mschuyen', function($dulieu){return '';})->addColumn('PIC', function($dlieu){ return User::findOrFail($dlieu->user_id)->name;})->make(true);
	}
}
