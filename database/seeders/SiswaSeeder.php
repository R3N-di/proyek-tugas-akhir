<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
                "id"=>$faker->regexify('[A-Z._%+-]+@[A-Z.-]+\.[A-Z]{2,4}'),
                "nis"=>$faker->numerify('1212####'),
                "nama"=>$faker->name,
                "password"=>$faker->regexify('[A-Z._%+-]+@[A-Z.-]+\.[A-Z]{2,4}'),
                "jk"=>$faker->randomElement($array = array ('l','p')),
                "gambar"=>"default_gambar.png",
                "idkelas"=>"",
                "idjurusan"=>""
            ]);
        }
    }
}
