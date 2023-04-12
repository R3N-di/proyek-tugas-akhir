<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $jurusan = [
            'RPL',
            'TKJ',
            'TKR',
        ];

        $nama = [
            'Rekayasa Perangkat Lunak ',
            'Teknik Komputer dan Jaringan ',
            'Teknik Kendaraan Ringan ',
        ];
        // $j = 1;
        for($i=0;$i<3;$i++){
            for($j=1;$j<5;$j++){
                DB::table('jurusan')->insert([
                    'jurusan' => $jurusan[$i].$j,
                    'nama' => $nama[$i].$j,
                    'created_at' => $faker->dateTime($max = 'now')
                ]);
            }
        }
    }
}
