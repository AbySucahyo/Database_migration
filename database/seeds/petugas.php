<?php

use Illuminate\Database\Seeder;

class petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas::insert([
            [
                'nama_petugas'=>'athena',
                'alamat'=>'jalan jeruk',
                'telp'=>'0812345678',
                'username'=>'abc',
                'password'=>'abc'

            ],
            [
                'nama_petugas'=>'kronos',
                'alamat'=>'jalan semangka',
                'telp'=>'0812436587',
                'username'=>'bcd',
                'password'=>'bcd'
            ],
            [
                'nama_petugas'=>'hydra',
                'alamat'=>'jalan anggur',
                'telp'=>'0831427586',
                'username'=>'cde',
                'password'=>'cde'
            ],
            [
                'nama_petugas'=>'poseidon',
                'alamat'=>'jalan durian',
                'telp'=>'0812534867',
                'username'=>'def',
                'password'=>'def'
            ],
            [
                'nama_petugas'=>'hercules',
                'alamat'=>'jalan apel',
                'telp'=>'0887654321',
                'username'=>'efg',
                'password'=>'efg'
            ],    
            
            ]);
    }
}
