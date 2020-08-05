<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'Prodi';

    protected $fillable = ['kode_prodi','nama_prodi','kaprodi'];

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'prodi_id', 'kode_prodi');
    }
}
