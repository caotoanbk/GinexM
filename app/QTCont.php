<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QTCont extends Model
{
	protected $fillable = ['dntung_id', 'nxchay', 'bsxe', 'lxe', 'scont', 'ccont', 'lcont', 'nxe', 'pnha', 'khquan', 'cxe', 'cgui', 'cmua', 'gvcVAT', 'cbcVAT', 'gvdchinh', 'bainang', 'baiha', 'trongluong', 'dieuxe', 'diadiemdongtrahang', 'phinangchuaVAT', 'VATphinang', 'sohoadonnang', 'nxuathoadonnang', 'dvicaphoadonnang', 'phihachuaVAT', 'VATphiha', 'sohoadonha','nxuathoadonha', 'dvicaphoadonha', 'boctokhai', 'hquantiepnhan','hquangiamsat', 'hquankiemhoa', 'cuoccont', 'llenhhangtau', 'luucont', 'luubai', 'phivesinh', 'phicatday', 'boctem', 'kddtvchuaVAT', 'VATkddtv', 'phingoaikddtv', 'cackhoankhacchokhach', 'sochi', 'ghichu', 'tong'];
	public function dntung()
	{
		return $this->belongsTo('App\Dntung', 'dntung_id');
	}
}
