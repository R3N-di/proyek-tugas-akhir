<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $password = $faker->regexify('[A-Z]{10}');
            DB::table('guru')->insert([
                "idguru"=>$faker->regexify('[A-Z]{11}'),
                "nip"=>$faker->numerify('##################'),
                "nama"=>$faker->name(),
                "password"=>Hash::make($password),
                "password_no_hash"=>$password,
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
