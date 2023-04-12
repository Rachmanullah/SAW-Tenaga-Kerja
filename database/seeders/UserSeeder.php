<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'Admin',
        ]);
        DB::table('users')->insert([
            'name' =>'Rachmanullah',
            'email' => 'rachmanullah1@gmail.com',
            'phone' => '085967162714',
            'password' => Hash::make('HarimauPutih45'),
            'role_id' => 1 ,
        ]);
    }
}
