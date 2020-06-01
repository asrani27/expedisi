<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';

    public function detailpengiriman()
    {
        return $this->hasMany(DetailPengiriman::class, 'pengiriman_id');
    }

    public function tujuan()
    {
        return $this->hasMany(Kantor::class, 'id','tujuan_id');
    }
}
