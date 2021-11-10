<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahunajaran extends Model
{
    protected $table = 'tahunajaran';
    protected $fillable = ['tahunajaran'];

    public function santri() {
        return $this->hasMany('App\Santri');
    }

    public function prestasi() {
        return $this->belongsToMany('App\Prestasi');
    }

    public function pelanggaran() {
        return $this->belongsToMany('App\Prestasi');
    }

    public function perizinan() {
        return $this->belongsToMany('App\Prestasi');
    }
}
