<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';

    public function petugas()
    {
        return $this->hasOne(Petugas::class, 'jabatan_id');
    }
}
