<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QTCont extends Model
{
	protected $fillable = ['dntung_id', 'nxchay', 'bsxe', 'lxe', 'scont', 'ccont', 'lcont', 'nxe', 'pnha', 'khquan', 'cxe', 'cgui', 'cmua', 'gvcVAT', 'cbcVAT', 'gvdchinh'];
	public function dntung()
	{
		return $this->belongsTo('App\Dntung', 'dntung_id');
	}
}
