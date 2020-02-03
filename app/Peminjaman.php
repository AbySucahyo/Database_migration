<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = "peminjaman" ;
    protected $primaryKey = "id" ;
    protected $fillable = [
        'tgl', 'id_anggota', 'id_petugas', 'tgl_deadline', 'denda',
    ];

    public $timestamps = false ;

    public function Anggota(){
        return this()->hasOne('App\Anggota','id_anggota');
    }
    public function Petugas(){
        return this()->hasOne('App\Petugas','id_petugas');
    }
}
