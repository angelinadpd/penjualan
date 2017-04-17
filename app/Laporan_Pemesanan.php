<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Laporan_Pemesanan extends implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

	  protected $table = 'laporan_pemesanan';
	  protected $guarded = ['idlaporan_pemesanan'];
	  protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	   public function pesan()
	    {
	        return $this->hasMany('App\Pesan');
	    }

	   public function barang()
	    {
	        return $this->hasMany('App\Barang');
	    }
}
