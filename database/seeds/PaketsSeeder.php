<?php

use Illuminate\Database\Seeder;
use App\Jenis;
use App\Paket;

class PaketsSeeder extends Seeder
{
    public function run()
    {
        $jenis1 = Jenis::create(['name'=>'Gold']);

        $paket1 = Paket::create(['paket'=>'luxury', 'isi'=>'gedung', 'harga'=>'2000', 'jenis_id'=>$jenis1->id]);
    }
}
