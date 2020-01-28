<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use Auth;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function show()
    {
        if(Auth::user()->level == 'admin'){
            $dt_buku=Buku::get();
            return Response()->json($dt_buku);
        }else{
            return Response()->json('Anda Bukan admin');
        }
    }

    public function store(Request $req){
        if(Auth::user()->level == 'admin'){
        
        $validator = Validator::make($req->all(),
        [
            'judul'=>'required',
            'penerbit'=>'required',
            'pengarang'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan = Buku::create([
            'judul'=>$req->judul,
            'penerbit'=>$req->penerbit,
            'pengarang'=>$req->pengarang,
            'foto'=>$req->foto
            
        ]);
        if($simpan){
            return Response()->json('Data Buku berhasil ditambahkan');
        }else{
            return Response()->json('Data Buku gagal ditambahkan');
        }
    }else{
        return Response()->json('Anda Bukan admin');
    }
    }

    public function update($id,Request $req){
        if(Auth::user()->level == 'admin'){

        $validator = Validator::make($req->all(),
        [
            'judul'=>'required',
            'penerbit'=>'required',
            'pengarang'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $ubah = Buku::where('id', $id)->update([
            'judul'=>$req->judul,
            'penerbit'=>$req->penerbit,
            'pengarang'=>$req->pengarang,
            'foto'=>$req->foto
        ]);
        if($ubah){
            return Response()->json('Data Buku berhasil diubah');
        }else{
            return Response()->json('Data Buku gagal diubah');
        }
    }else{
        return Response()->json('Anda Bukan admin');
    }
    }

    public function destroy($id){
        if(Auth::user()->level == 'admin'){

        $hapus = Buku::where('id', $id)->delete();
        if($hapus){
            return Response()->json('Data Buku berhasil dihapus');
        }else{
            return Response()->json('Data Buku gagal dihapus');
        }
    }else{
        return Response()->json('Anda Bukan admin');
    }
    }
}
