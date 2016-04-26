<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dntung;
use Datatables;
use Carbon\Carbon;

class DatatablesController extends Controller
{
	public function yclhangData()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('created_at', '>=', Carbon::now()->startOfMonth());
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">Tải File</a>';	
		})->addColumn('status', function($yclhang){
			$check=$yclhang->check;
			$approve=$yclhang->approve;
			$done=$yclhang->done;
			if($done){
				return '<small class="text-success"><em>Đã hoàn thành</em></small>';
			}
			if($approve){
				if(Carbon::now()->gt(Carbon::createFromFormat('d/m/Y', $yclhang->tghung))){
					return '<small class="text-danger"><em><a id="qhan" data-toggle="modal" data-target="#myModal1" href="#" data-id="'.$yclhang->id.'">Qúa hạn quyết toán</a></em></small>';
				} else {
					return '<small class="text-primary"><em><a data-toggle="modal" data-target="#myModal1" href="#" data-id="'.$yclhang->id.'">Chưa quyết toán</a></em></small>';
				}
			}
			if($check){
				return '<small class="text-warning"><em>Chưa duyệt</em></small>';
			}
			return '<small class="text-muted"><em>Chưa viết phiếu chi</em></small>';	

		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function secrectaryData(Request $request)
	 {
		 if(!$request->ajax())
			 return redirect('/');

		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('created_at', '>=', Carbon::now()->startOfMonth());
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-default">Tải File</a>';	
		})->addColumn('status', function($yclhang){

			$check=$yclhang->check;
			$approve=$yclhang->approve;
			$done=$yclhang->done;
			if($done){
				return '<small class="text-success"><em>Đã hoàn thành</em></small>';
			}
			if($approve){
				if(Carbon::now()->gt(Carbon::createFromFormat('d/m/Y', $yclhang->tghung))){
					return '<small class="text-danger"><em><a id="qhan" data-toggle="modal" data-target="#myModal1" href="#" data-id="'.$yclhang->id.'">Qúa hạn quyết toán</a></em></small>';
				} else {
					return '<small class="text-primary"><em><a data-toggle="modal" data-target="#myModal1" href="#" data-id="'.$yclhang->id.'">Chưa quyết toán</a></em></small>';
				}
			}
			if($check){
				return '<small class="text-warning"><em>Chưa duyệt</em></small>';
			}
			return '<small class="text-muted"><em>Chưa viết phiếu chi</em></small>';	

		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	 }
	public function directorData()
	{
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check', 'approve', 'done'])->where('created_at', '>=', Carbon::now()->startOfMonth())->where('check', '=', true);
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">Tai File</a>';	
		})->addColumn('status', function($yclhang){
			$approve=$yclhang->approve;
			$done=$yclhang->done;
			if(!$approve){
				return '<a href="#" class="duyet" data-id="'.$yclhang->id.'"><em><small>Duyệt</small></em></a>';
			}
			if($done){
				return '<small class="text-success"><em>Đã hoàn thành</em></small>';
			}
			if(Carbon::now()->gt(Carbon::createFromFormat('d/m/Y', $yclhang->tghung))){
				return '<small class="text-danger"><em><a id="qhan" data-toggle="modal" data-target="#myModal1" href="#" data-id="'.$yclhang->id.'">Qúa hạn quyết toán</a></em></small>';
			} else {
				return '<small class="text-primary"><em><a data-toggle="modal" data-target="#myModal1" href="#" data-id="'.$yclhang->id.'">Chưa quyết toán</a></em></small>';
			}

		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
}
