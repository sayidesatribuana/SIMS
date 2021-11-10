<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    protected $table = 'perizinan';
    protected $fillable = ['tanggalperizinan', 'tanggalkembali', 'perihalperizinan', 'keterangankembali', 'tahunajaran'];

    public function santri() {
        return $this->belongsTo('App\Santri');
    }

    public function tahunajaran() {
        return $this->belongsTo('App\Tahunajaran');
    }
}
