<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    protected $table = 'pelanggaran';
    protected $fillable = ['nomorinduk', 'namasantri', 'kelas', 'tanggalpelanggaran', 'namapelanggaran', 'jenispelanggaran', 'sanksipelanggaran','tahunajaran', 'buktipelanggaran'];

    public function santri() {
        return $this->belongsTo('App\Santri');
    }

    public function tahunajaran() {
        return $this->belongsToMany('App\Tahunajaran');
    }
}
