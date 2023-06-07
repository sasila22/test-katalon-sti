<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTime;

class Jabatan extends Model
{
    //
    public function periodes()
    {
        return $this->belongsTo('App\Periode', 'id_periode');
    }
     public function strukturs()
    {
        return $this->belongsTo('App\Struktur', 'id_struktur');
    }
    public function ubahTahun($a)
    {
        return Carbon::parse($a)->format('Y');
    }

 
}
