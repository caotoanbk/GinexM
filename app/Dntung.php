<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Dntung extends Model
{
	protected $fillable=['user_id', 'reason', 'bill', 'slc20', 'slc40', 'lcont', 'khang', 'ttien', 'tghung', 'cuoc', 'nang', 'ha', 'hquan', 'psinh', 'date_done', 'loaihang', 'tuyenduong', 'khachhang', 'ndonghang', 'ttien_ltron', 'nyeucau', 'ngiaohang', 'nnhanhang', 'nhaxe', 'stokhai', 'slcont', 'slchroi', 'slcnong', 'slclanh', 'hangtau', 'playlenh', 'pbtokhai', 'phqtiepnhan', 'pitokhai', 'pkddongvat', 'pkdthucvat'];

	protected $dates=['created_at', 'updated_at', 'tghung', 'date_done', 'ndonghang', 'ngiaohang', 'nnhanhang', 'nyeucau'];

	public function getTghungAttribute($date)
	{
		$string_date = Carbon::parse($date)->format('Y-m-d');
		if($string_date=="-0001-11-30"){
			return '';
		}else
			return $string_date;
	}
	public function getNyeucauAttribute($date)
	{
		$string_date = Carbon::parse($date)->format('Y-m-d');
		if($string_date=="-0001-11-30"){
			return '';
		}else
			return $string_date;
	}
	public function getNdonghangAttribute($date)
	{
		$string_date = Carbon::parse($date)->format('Y-m-d');
		if($string_date=="-0001-11-30"){
			return '';
		}else
			return $string_date;
	}
	public function getNgiaohangAttribute($date)
	{
		$string_date = Carbon::parse($date)->format('Y-m-d');
		if($string_date=="-0001-11-30"){
			return '';
		}else
			return $string_date;
	}
	public function getNnhanhangAttribute($date)
	{
		$string_date = Carbon::parse($date)->format('Y-m-d');
		if($string_date=="-0001-11-30"){
			return '';
		}else
			return $string_date;
	}
	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	public function getCreatedAtAttribute($date)
	{
		return Carbon::parse($date)->format('d/m/Y');
	}
	public function qtoans()
	{
		return $this->hasMany('App\Quyettoan', 'dntung_id');
	}
	public function qtconts()
	{
		return $this->hasMany('App\QTCont', 'dntung_id');
	}
}
