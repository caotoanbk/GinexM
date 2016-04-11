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
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'check'])->where('created_at', '>=', Carbon::now()->startOfMonth());
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">Tai File</a>';	
		})->addColumn('status', function($yclhang){
			$check=$yclhang->check;
			$approve=$yclhang->approve;
			$lamhang=$yclhang->lamhang;
			if($check){
				return '<small class="text-danger"><em>Da duoc kiem tra</em></small>';
			}else{
				return '<small class="text-danger"><em>Chua duoc kiem tra</em></small>';	}

		})->addColumn('check', function($yclhang){return '<input type="checkbox">';})->addColumn('responsive', function($yclhang){return '';})->make(true);
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
}
