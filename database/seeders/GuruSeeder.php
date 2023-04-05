<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feker=Faker::create('id_ID');
        for($i=1;$i<=10;$i++){
            DB::table('guru')->insert([
                "id"=>$feker->regexify('[A-Z._%+-]+@[A-Z.-]+\.[A-Z]{2,4}'),
                "nip"=>$feker->numerify('##################'),
                "nama"=>$feker->name(),
                "password"=>$feker->regexify('[A-Z._%+-]+@[A-Z.-]+\.[A-Z]{2,4}'),
                "jk"=>$feker->randomElement($array = array ('L','P')),
                "gambar"=>"default_gambar.png",
                "idmapel"=>""
            ]);
        }
    }
}
