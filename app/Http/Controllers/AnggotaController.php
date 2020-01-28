<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use Auth;
use Illuminate\Support\Facades\Validator;


class AnggotaController extends Controller
{
    public function show()
    {
        if(Auth::user()->level == 'admin'){
            $dt_anggota=Anggota::get();
            return Response()->json($dt_anggota);
        }else{
            return Response()->json('Anda Bukan admin');
        }
    }

    public function store(Request $req){
        if(Auth::user()->level == 'admin'){
        
        $validator = Validator::make($req->all(),
        [
            'nama_anggota'=>'required',
            'alamat'=>'required',
            'telp'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan = Anggota::create([
            'nama_anggota'=>$req->nama_anggota,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp
            
        ]);
        if($simpan){
            return Response()->json('Data Anggota berhasil ditambahkan');
        }else{
            return Response()->json('Data Anggota gagal ditambahkan');
        }
    }else{
        return Response()->json('Anda Bukan admin');
    }
    }

    public function update($id,Request $req){
        if(Auth::user()->level == 'admin'){

        $validator = Validator::make($req->all(),
        [
            'nama_anggota'=>'required',
            'alamat'=>'required',
            'telp'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $ubah = Anggota::where('id', $id)->update([
            'nama_anggota'=>$req->nama_anggota,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp
        ]);
        if($ubah){
            return Response()->json('Data Anggota berhasil diubah');
        }else{
            return Response()->json('Data Anggota gagal diubah');
        }
    }else{
        return Response()->json('Anda Bukan admin');
    }
    }

    public function destroy($id){
        if(Auth::user()->level == 'admin'){

        $hapus = Anggota::where('id', $id)->delete();
        if($hapus){
            return Response()->json('Data Anggota berhasil dihapus');
        }else{
            return Response()->json('Data Anggota gagal dihapus');
        }
    }else{
        return Response()->json('Anda Bukan admin');
    }
    }
}
