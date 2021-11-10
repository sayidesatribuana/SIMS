<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';
    protected $fillable = ['nomorinduk', 'namasantri', 'jeniskelamin', 'tempatlahir', 'tanggallahir', 'alamat', 'nomorhp', 'kelas', 'tahunajaran'];

    public function kelas() {
        return $this->belongsTo('App\Kelas');
    }

    public function tahunajaran() {
        return $this->belongsTo('App\Tahunajaran');
    }

    public function prestasi() {
        return $this->hasMany('App\Prestasi');
    }

    public function pelanggaran() {
        return $this->hasMany('App\Pelanggaran');
    }

    public function perizinan() {
        return $this->hasMany('App\Perizinan');
    }
}
