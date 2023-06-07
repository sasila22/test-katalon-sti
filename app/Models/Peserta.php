<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    public $timestamps = false;

    public function pendaftaran()
    {
    	return $this->belongsTo('App\Pendaftaran', 'id_pendaftaran');
    }
    public function pemain()
    {
    	return $this->belongsTo('App\Pemain', 'id_pemain');
    }
}
