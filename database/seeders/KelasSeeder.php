<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for($i=10;$i<=13;$i++){
            DB::table('kelas')->insert([
                'kelas' => $i,
                'created_at' => $faker->dateTime($max = 'now')
            ]);
        }
    }
}
