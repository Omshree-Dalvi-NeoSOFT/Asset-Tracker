<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Omshree Dalvi',
            'email'=>'omshreedalvi31@gmail.com',
            'password'=>Hash::make('Omshree@31'),
        ]);
    }
}
