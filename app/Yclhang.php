<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yclhang extends Model
{
	protected $fillable = ['user_id', 'bill', 'status'];
	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
}
