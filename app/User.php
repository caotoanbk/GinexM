<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function yclhang()
	{
		return $this->hasMany('App\Yclhang', 'user_id');
	}
	public function dntung()
	{
		return $this->hasMany('App\Dntung', 'user_id');
	}
}
