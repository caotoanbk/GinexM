<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dntung;

class BieumauController extends Controller
{
	public function phieuchi($id)
	{
		$dntung=Dntung::findOrFail($id);
		$dntung->check=true;
		$dntung->save();
		return view('bieumau.phieuchi', compact('dntung'));
	}
}
