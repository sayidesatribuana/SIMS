<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['kelas'];

    public function santri() {
        return $this->hasMany('App\Santri');
    }
}
