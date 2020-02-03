<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use App\Anggota;
use App\Detail;
use App\Petugas;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;


class PeminjamanController extends Controller
{
    public function store(Request $req){
        if(Auth::user()->level == 'petugas'){
        
        $validator = Validator::make($req->all(),
        [
            'id_anggota'=>'required',
            'id_buku'=>'required',
            'qty'=>'required',
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
    
        $tanggal = date("Y-m-d H:i:s");
        $deadline = date("Y-m-d H:i:s", strtotime('+7 days',strtotime($tanggal)));

        $simpan = Peminjaman::create([
            'tgl'=>$tanggal,
            'id_anggota'=>$req->id_anggota,
            'id_petugas'=>Auth::user()->id,
            'tgl_deadline'=>$deadline,
            'denda'=> null
            
        ]);

        if($simpan){
            $peminjaman = Peminjaman::where('tgl',$tanggal)->first();
            $detail = Detail::create([
                'id_pinjam' => $peminjaman->id,
                'id_buku' => $req->id_buku,
                'qty' => $req->qty
            ]);

        if($detail){
            return Response()->json('Data Peminjaman berhasil ditambahkan');
        }else{
            return Response()->json('Data Peminjaman gagal ditambahkan');
        }
    }else{
        return Response()->json('Data Peminjaman gagal ditambahkan');
    }
    }else{
        return Response()->json('Anda Bukan petugas');
    }
    
}
    public function show($id)
    {
        if(Auth::user()->level == 'petugas'){
        $datapinjam = DB::table('peminjaman')->join('anggota','peminjaman.id_anggota','=','anggota.id')
                    ->where('peminjaman.id','=',$id)
                    ->select('peminjaman.*','anggota.*')->first();
        $data_peminjam = array();
            $buku = DB::table('detail_peminjaman')->join('buku','detail_peminjaman.id_buku','=','buku.id')
                    ->where('detail_peminjaman.id_pinjam','=',$id)
                    ->select('detail_peminjaman.*','buku.*')->get();
            $arr_buku = array();
            foreach($buku as $b){
                $arr_buku[] = array(
                    'id_peminjaman' => $b->id_pinjam,
                    'id_buku' => $b->id_buku
                );
            }
            $data_peminjam[] = array(
                'id anggota' => $datapinjam->id_anggota,
                'nama anggota' => $datapinjam->nama_anggota,
                'id petugas' => $datapinjam->id_petugas,
                'tanggal pinjam' => $datapinjam->tgl,
                'tanggal deadline' => $datapinjam->tgl_deadline,
                'denda' => $datapinjam->denda,
                'daftar buku dipinjam' => $arr_buku 
            );   
        return response()->json(compact('data_peminjam'));
}else{
    return Response()->json('Anda Bukan petugas');
}
}
}