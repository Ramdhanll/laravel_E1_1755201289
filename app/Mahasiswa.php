<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = ['nim','nama_lengkap','prodi_id','alamat'];

    public function Prodi()
    {
        return $this->hasOne(Prodi::class, 'kode_prodi', 'prodi_id');
    }
}
