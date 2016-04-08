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
		$yclhangs = Dntung::select(['id', 'created_at', 'reason', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh'])->where('created_at', '>=', Carbon::now()->startOfMonth());
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			$my = date("Y/m");
			return '<a href="/de_nghi_tam_ung/'.$my.'/'.$yclhang->id.'.xlsx'.'". class="btn btn-xs btn-primary">Tai File</a>';	
		})->addColumn('status', function($yclhang){
			$check=$yclhang->check;
			$approve=$yclhang->approve;
			$lamhang=$yclhang->lamhang;
			if($check){
				if($approve){
					if($lamhang){
						return 'da lam hang';	
					}else{
						return'<small class="text-danger"><em>Duoc phep lam hang</em></small><button>Da hoan thanh</button>';   	
					}
				}else{
					return '<small class="text-danger"><em>Chua duoc duyet</em></small>'; 
				}
			}else{
				return '<small class="text-danger"><em>Chua duoc kiem tra</em></small>';	}
		})->make(true);
	}
	public function test()
	{
		$test=Dntung::select(['created_at'])->first();
		dd($test);
		
		$now = Carbon::now();
		$currentYear= $now->year;
		$currentMonth = $now->month;
		dd($currentMonth);

	}
}
