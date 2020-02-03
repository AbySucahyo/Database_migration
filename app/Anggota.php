<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = "anggota" ;
    protected $primaryKey = "id" ;
    protected $fillable = [
        'nama_anggota', 'alamat', 'telp',
    ];

    public $timestamps = false ;

    public function Peminjaman(){
        return this()->hasMany('App\Peminjaman','id');
    }
}
