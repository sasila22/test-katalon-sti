<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Gabsi extends Model
{
    public function periodes()
    {
    	return $this->hasMany('App\Periode');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function clubs()
    {
        return $this->hasMany('App\Club');
    }
    public function ubahTahun($a)
    {
    	return Carbon::parse($a)->format('Y');
    }
}
