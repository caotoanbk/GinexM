<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quyettoan extends Model
{
	protected $fillable=['dntung_id', 'ldo', 'hdon', 'nchi', 'stien', 'chicho', 'nphanh', 'gchu', 'dvtinh', 'soluong', 'dongia', 'VAT', 'tong'];
}
