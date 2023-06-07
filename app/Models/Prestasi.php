<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasis';
    protected $primaryKey = 'id_prestasi';

    public function pemain()
    {
    	//this hasmany(nama objek, foreign_key, primarykey_sendiri)
    	return $this->belongsTo('App\Pemain', 'id');
    }

    public function kejuaraan()
    {
    	//this hasmany(nama objek, foreign_key, primarykey_sendiri)
    	return $this->belongsTo('App\Kejuaraan', 'id');
    }
}
