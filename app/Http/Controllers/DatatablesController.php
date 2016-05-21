<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dntung;
use Datatables;
use Carbon\Carbon;

class DatatablesController extends Controller
{
	public function dntung_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('approve', false)->where('user_id', \Auth::user()->id)->where('created_at', '>=', Carbon::now()->startOfMonth());
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
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('user_id', \Auth::user()->id)->where('approve', true)->where('done', false)->where('created_at', '>=', Carbon::now()->startOfMonth());
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
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('user_id', \Auth::user()->id)->where('done', true)->where('created_at', '>=', Carbon::now()->startOfMonth());
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">Tải File</a>';	
		})->addColumn('status', function($yclhang){
			return '<small class="text-success"><em><a class="text-success" href="/quyet-toan-lam-hang-secrectary/'.$yclhang->id.'">Đã hoàn thành</a></em></small>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function sec_tuchthanh_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('done', false)->where('created_at', '>=', Carbon::now()->startOfMonth());
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
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('done', true)->where('created_at', '>=', Carbon::now()->startOfMonth());
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
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('created_at', '>=', Carbon::now()->startOfMonth())->where('check', '=', true)->where('approve', false);
		return Datatables::of($yclhangs)->addColumn('status', function($yclhang){
			return '<a href="#" class="duyet" data-id="'.$yclhang->id.'"><em><small>Duyệt</small></em></a>';
		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function direc_tucqtoan_home()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('created_at', '>=', Carbon::now()->startOfMonth())->where('approve', '=', true)->where('done', false);
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
}
