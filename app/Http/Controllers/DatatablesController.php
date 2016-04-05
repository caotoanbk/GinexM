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
		$now = Carbon::now();
		$currentYear= $now->year;
		$currentMonth = $now->month;
		$yclhangs = Dntung::select(['created_at', 'bill', 'slc20','slc40', 'khang', 'ttien', 'lcont', 'tghung'])->where('created_at', '>=', Carbon::now()->startOfMonth());
		return Datatables::of($yclhangs)->addColumn('bke', function($yclhang){
			return '<a href="/robots.txt" class="btn btn-xs btn-primary">File</a>';	
		})->addColumn('status', function($yclhang){
			return '<small class="text-danger"><em>Chua duoc kiem tra</em></small>';	
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
