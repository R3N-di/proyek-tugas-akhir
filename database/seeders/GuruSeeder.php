<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create('id_ID');
        for($i=1;$i<=5;$i++){
            DB::table('guru')->insert([
                "id"=>$faker->regexify('[A-Z]{11}'),
                "nip"=>$faker->numerify('##################'),
                "nama"=>$faker->name(),
                "password"=>$faker->regexify('[A-Z]{10}'),
                "jk"=>$faker->randomElement($array = array ('L','P')),
                "gambar"=>"default_gambar.png",
                "idmapel"=> $faker-> randomElement($array = array (
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
                )),
            ]);
        }
    }
}
