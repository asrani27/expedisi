<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    
    public function tahun()
    {
        return $this->belongsToMany('App\Tahun', 'tahun_guru', 'tahun_id', 'guru_id');
    }

    public function kelas()
    {
        return $this->belongsToMany('App\Kelas', 'wali_kelas', 'guru_id', 'kelas_id');
    }
}
