<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = [
            'Rendi',
            'Cakra',
            "Mun'im"
        ];

        $jk = [
            'L',
            'L',
            'L',
        ];

        $email = [
            'Rendi@gmail.com',
            'Cakra@gmail.com',
            "Mun'in@gmail.com",
        ];

        $password = [
            'rendi123',
            'cakra123',
            "mun'im123",
        ];
        
        for($i=0;$i<3;$i++){
            DB::table('users')->insert([
                'name' => $name[$i],
                'jk' => $jk[$i],
                'email' => $email[$i],
                'password' => Hash::make($password[$i]),
            ]);
        }
    }
}
