<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Yclhang;
use Datatables;

class DatatablesController extends Controller
{
	public function yclhangData()
	{
		$yclhangs = Yclhang::select(['id', 'bill', 'status', 'created_at']);
		return Datatables::of($yclhangs)->make(true);
	}
}
