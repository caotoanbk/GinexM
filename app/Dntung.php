<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Dntung extends Model
{
	protected $fillable=['user_id', 'bill', 'slc20', 'slc40', 'lcont', 'khang', 'ttien', 'tghung'];

	protected $dates=['created_at', 'updated_at', 'tghung'];

	public function getTghungAttribute($date)
	{
		return Carbon::parse($date)->format('d/m/Y');
	}
	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	public function getCreatedAtAttribute($date)
	{
		return Carbon::parse($date)->format('d/m/Y');
	}
}
