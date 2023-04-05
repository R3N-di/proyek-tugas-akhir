<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for($i=1;$i<=10;$i++){
            DB::table('siswa')->insert([
                "id"=>$faker->regexify('[A-Z]{11}'),
                "nis"=>$faker->numerify('1212####'),
                "nama"=>$faker->name,
                "password"=>$faker->regexify('[A-Z]{10}'),
                "jk"=>$faker->randomElement($array = array ('L','P')),
                "gambar"=>"default_gambar.png",
                "idkelas"=> $faker-> randomElement($array = array (
                    '10',
                    '11',
                    '12',
                    '13'
                )),
                "idjurusan"=>$faker-> randomElement($array = array (
                    'RPL1',
                    'RPL2',
                    'TKJ1',
                    'TKJ2',
                    'TKR1',
                    'TKR2',
                    'TKR3',
                    'TKR4',
                    'TOI1',
                    'TOI2'
                )),
            ]);
        }
    }
}
