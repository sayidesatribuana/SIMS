<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datasantri extends Model
{
    protected $fillable = ['nomorinduk', 'namasantri', 'jeniskelamin', 'tempatlahir', 'tanggallahir', 'alamat', 'nomorhp', 'kelas', 'tahunajaran', 'user_id'];
}
