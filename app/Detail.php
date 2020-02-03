<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table="detail_peminjaman";
    protected $fillable = ['id_pinjam','id_buku','qty'];
    public function Buku(){
        return this()->hasMany('App\Buku','id_buku');
    }
}
