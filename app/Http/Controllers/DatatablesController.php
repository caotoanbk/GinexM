<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dntung;
use Datatables;
use Carbon\Carbon;
use App\Quyettoan;
use App\QTCont;


class DatatablesController extends Controller
{
	public function dntung_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('approve', false)->where('user_id', \Auth::user()->id);
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">Tải File</a>';	
		})->addColumn('status', function($yclhang){
			$check=$yclhang->check;
			if($check){
				return '<small class="text-warning"><em>Chưa duyệt</em></small>';
			}
			return '<small class="text-muted"><em>Chưa viết phiếu chi</em></small>';	

		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function tucqtoan_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('user_id', \Auth::user()->id)->where('approve', true)->where('done', false);
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">Tải File</a>';	
		})->addColumn('status', function($yclhang){
			if(Carbon::now()->gt(Carbon::createFromFormat('d/m/Y', $yclhang->tghung))){
				return '<small class="text-danger"><em><a id="qhan" href="/quyet-toan-lam-hang/'.$yclhang->id.'">Qúa hạn quyết toán</a></em></small>';
			} else {
				return '<small class="text-primary"><em><a href="/quyet-toan-lam-hang/'.$yclhang->id.'">Chưa quyết toán</a></em></small>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function tudhthanh_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('user_id', \Auth::user()->id)->where('done', true);
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">Tải File</a>';	
		})->addColumn('status', function($yclhang){
			return '<small class="text-success"><em><a class="text-success" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Đã hoàn thành</a></em></small>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function sec_tuchthanh_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('done', false);
		return Datatables::of($yclhangs)->addColumn('status', function($yclhang){
			$check=$yclhang->check;
			$approve=$yclhang->approve;
			if($approve){
				if(Carbon::now()->gt(Carbon::createFromFormat('d/m/Y', $yclhang->tghung))){
					return '<small class="text-danger"><em><a id="qhan" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Qúa hạn quyết toán</a></em></small>';
				} else {
					return '<small class="text-primary"><em><a href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Chưa quyết toán</a></em></small>';
				}
			}
			if($check){
				return '<small class="text-warning"><em>Chưa duyệt</em></small>';
			}
			return '<small class="text-muted"><em>Chưa viết phiếu chi</em></small>';	

		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function sec_tudhthanh_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('done', true);
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-default">Tải File</a>';	
		})->addColumn('status', function($yclhang){
			$done=$yclhang->done;
				return '<small class="text-success"><em><a class="text-success" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Đã hoàn thành</a></em></small>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_tucduyet_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('check', '=', true)->where('approve', false);
		return Datatables::of($yclhangs)->addColumn('status', function($yclhang){
			return '<a href="#" class="duyet" data-id="'.$yclhang->id.'"><em><small>Duyệt</small></em></a>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_tucqtoan_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('approve', '=', true)->where('done', false);
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">Tai File</a>';	
		})->addColumn('status', function($yclhang){
			if(Carbon::now()->gt(Carbon::createFromFormat('d/m/Y', $yclhang->tghung))){
				return '<small class="text-danger"><em><a id="qhan" href="/quyet-toan-lam-hang-director/'.$yclhang->id.'">Qúa hạn quyết toán</a></em></small>';
			} else {
				return '<small class="text-primary"><em><a href="/quyet-toan-lam-hang-director/'.$yclhang->id.'">Chưa quyết toán</a></em></small>';
			}
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_tudhthanh_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('done', true);
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">Tai File</a>';	
		})->addColumn('status', function($yclhang){
				return '<small class="text-success"><em><a class="text-success" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Đã hoàn thành</a></em></small>'; })->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function tongkethangmuc($year, $month)
	{
		if($month <10) 
			$str_month='0'.strval($month);
		else
			$str_month = strval($month);
		$str_year = strval($year);
		$ym = $str_year.'-'.$str_month.'-';
		$dulieus = Quyettoan::join('dntungs', 'quyettoans.dntung_id', '=', 'dntungs.id')->select(['quyettoans.nchi', 'quyettoans.ldo', 'dntungs.slc20', 'dntungs.slc40', 'dntungs.lcont', 'dntungs.khang', 'dntungs.bill', 'quyettoans.stien', 'quyettoans.hdon', 'quyettoans.nphanh', 'quyettoans.gchu', 'dntungs.date_done'])->where('dntungs.done', true)->where('dntungs.date_done', 'LIKE', $ym.'%');
		return Datatables::of($dulieus)->addColumn('tongcont', function($dlieu){return $dlieu->slc20+$dlieu->slc40;})->addColumn('tienchuaVAT', function($dlieu){return round($dlieu->stien/1.1);})->addColumn('VAT', function($dulieu){return round($dulieu->stien/1.1*0.1);})->addColumn('qtoancty', function($dulieu){return $dulieu->stien;})->make(true);
	}
	public function tongketbooking($year, $month)
	{
		if($month <10) 
			$str_month='0'.strval($month);
		else
			$str_month = strval($month);
		$str_year = strval($year);
		$ym = $str_year.'-'.$str_month.'-';
		$dulieus = QTCont::join('dntungs', 'q_t_conts.dntung_id', '=', 'dntungs.id')->select(['dntungs.khang', 'q_t_conts.nxchay', 'q_t_conts.bsxe', 'dntungs.loaihang', 'dntungs.tuyenduong', 'dntungs.khachhang', 'q_t_conts.lxe', 'q_t_conts.scont', 'q_t_conts.ccont', 'q_t_conts.nxe', 'q_t_conts.lcont', 'dntungs.bill', 'q_t_conts.pnha', 'q_t_conts.khquan', 'q_t_conts.cxe', 'q_t_conts.cgui', 'q_t_conts.cmua', 'q_t_conts.gvcVAT', 'q_t_conts.cbcVAT', 'q_t_conts.gvdchinh'])->where('dntungs.done', true)->where('dntungs.date_done', 'LIKE', $ym.'%');
		return Datatables::of($dulieus)->addColumn('pnhaVAT', function($dulieu){return round($dulieu->pnha*0.1);})->addColumn('VATgvon', function($dulieu){return round($dulieu->gvcVAT*0.1);})->addColumn('VATgvdchinh', function($dulieu){return round($dulieu->gvdchinh*0.1);})->addColumn('lngop1', function($dulieu){return ($dulieu->cbcVAT - $dulieu->gvcVAT);})->addColumn('lngop2', function($dulieu){return ($dulieu->cbcVAT -$dulieu->gvdchinh);})->addColumn('mschuyen', function($dulieu){return 'ma so chuyen';})->make(true);
	}
}
