<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dntung;

class CuratorController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function tongketthang()
	{
		return view('user.director.tongket'); 
	}
	public function cur_khlhang_index()
	{
		return view('user.curator.khlhang_home');
	}
	public function cur_dntung_index()
	{
		return view('user.curator.dntung_home');
	}
	public function cur_tuclhang_index()
	{
		return view('user.curator.tuclhang_home');
	}
	public function cur_tucqtoan_index()
	{
		return view('user.curator.tucqtoan_home');
	}
	public function cur_tudhthanh_index()
	{
		return view('user.curator.tudhthanh_home');
	}
	public function checkKHLH($id)
	{
		$khlh = Dntung::findOrFail($id);
		$khlh->curator_check = true;
		$khlh->curator_cancel_check = false;
		$khlh->save();
		return 'Curator check success';
	}
	public function uncheckKHLH($id)
	{
		$khlh = Dntung::findOrFail($id);
		$khlh->curator_check = false;
		$khlh->approve = false;
		$khlh->curator_cancel_check = true;
		$khlh->save();
		return 'Curator uncheck success';
	}
	public function checkTU($id)
	{
		$khlh = Dntung::findOrFail($id);
		$khlh->curator_check_tu = true;
		$khlh->save();
		return 'Curator check tu success';
	}
	public function uncheckTU($id)
	{
		$khlh = Dntung::findOrFail($id);
		$khlh->curator_check_tu = false;
		$khlh->director_check_tu = false;
		$khlh->secrectary_check_tu = false;
		$khlh->save();
		return 'Curator uncheck tu success';
	}
}
