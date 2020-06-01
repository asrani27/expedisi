<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengiriman extends Model
{
    protected $table = 'detail_pengiriman';
    
    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'pengiriman_id');
    }
}
