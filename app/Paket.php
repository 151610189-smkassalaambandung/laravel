<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = ['paket', 'jenis_id', 'isi', 'harga'];

    public function jenis()
    {
    	return $this->belongsTo('App\Jenis');
    }
}
