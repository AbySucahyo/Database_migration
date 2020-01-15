<?php

use Illuminate\Database\Seeder;

class anggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Anggota::insert([
            [
                'nama_anggota'=>'kraken',
                'alamat'=>'jalan raya',
                'telp'=>'080808123456'
            ],
            [
                'nama_anggota'=>'megalodon',
                'alamat'=>'jalan rel',
                'telp'=>'080808987654'
            ],
            [
                'nama_anggota'=>'zeus',
                'alamat'=>'jalan olympus gang I',
                'telp'=>'080808675432'
            ],
            [
                'nama_anggota'=>'kratos',
                'alamat'=>'jalan olympus gang II',
                'telp'=>'080808423167'
            ],
            [
                'nama_anggota'=>'hades',
                'alamat'=>'jalan simpang olympus',
                'telp'=>'080808869780'
            ],    
            
            ]);
    }
}
