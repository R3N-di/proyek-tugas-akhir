<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $mapel = [
            'Matematika',
            'Pendidikan Agama Islam',
            'Pendidikan Pancasila dan Kewarganegaraan',
            'Pemrograman Berorientasi Objek',
            'Pendidikan Jasmani Olahraga dan Kesehatan',
            'Bahasa Inggris',
            'Bahasa Indonesia',
            'Pemograman Website',
            'Fisika',
            'Kimia',
            'Basis Data',
            'Bimbingan Konseling',
        ];
        for($i=0;$i<=11;$i++){
            DB::table('mapel')->insert([
                'mapel' => $mapel[$i],
                'created_at' => $faker->dateTime($max = 'now')
            ]);
        }
    }
}
