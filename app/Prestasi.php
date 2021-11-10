<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';
    protected $fillable = ['nomorinduk', 'namasantri', 'kelas', 'tanggalprestasi', 'namaprestasi', 'jenisprestasi', 'tahunajaran', 'buktiprestasi'];

    public function santri() {
        return $this->belongsTo('App\Santri');
    }

    public function tahunajaran() {
        return $this->belongsToMany('App\Tahunajaran');
    }
}
