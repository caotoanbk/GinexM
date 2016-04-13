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
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">Tai File</a>';	
		})->addColumn('status', function($yclhang){
			$check=$yclhang->check;
			$approve=$yclhang->approve;
			$done=$yclhang->done;
			if($done){
				return '<small class="text-success"><em>Da hoan thanh</em></small>';
			}
			if($approve){
				return '<small class="text-info"><em><a href="#">Chua quyet toan</a></em></small>';
			}
			if($check){
				return '<small class="text-danger"><em>Chua duyet</em></small>';
			}
			return '<small class="text-warning"><em>Chua viet phieu chi</em></small>';	

		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
	public function secrectaryData(Request $request)
	 {
		 if(!$request->ajax())
			 return redirect('/');

		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check'])->where('created_at', '>=', Carbon::now()->startOfMonth());
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-default">Tai File</a>';	
		})->addColumn('status', function($yclhang){
			return '<a href="/bieumau/phieuchi/'.$yclhang->id.'" id="test" class="btn btn-xs btn-primary">In phieu chi</a>';
		})->make(true);
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
				return '<button class="btn btn-sm btn-primary duyet" data-id="'.$yclhang->id.'">Duyet</button>';
			}
			if($done){
				return '<small class="text-success"><em>Da hoan thanh</em></small>';
			}
			return '<small class="text-danger"><em>Chua quyet toan</em></small>';	

		})->addColumn('check', function($yclhang){return '';})->addColumn('resp', function($yclhang){return '';})->make(true);
	}
}
