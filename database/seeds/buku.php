<?php

use Illuminate\Database\Seeder;

class buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Buku::insert([
            [
                'judul'=>'Sang Pemimpi',
                'penerbit'=>'Pustaka Jaya',
                'pengarang'=>'Khoirul Adjie'
            ],
            [
                'judul'=>'Si Dhono',
                'penerbit'=>'Bintang Jaya',
                'pengarang'=>'Mamank'
            ],
            [
                'judul'=>'Kurang Kopi',
                'penerbit'=>'Jaya Makmur',
                'pengarang'=>'Ronaldikin'
            ],
            [
                'judul'=>'Toriq toriq',
                'penerbit'=>'Central Jaya',
                'pengarang'=>'Tatik Suyitno'
            ],
            [
                'judul'=>'Uklam-Uklam',
                'penerbit'=>'Jaya Asri',
                'pengarang'=>'Tok Dalang Ranggi'
            ],    
            
            ]);
    }
}
