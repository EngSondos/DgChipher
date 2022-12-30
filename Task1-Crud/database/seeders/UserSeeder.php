<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=> 'sondos',
            'email'=>'sondos4@gmail.com',
            'password'=>\Hash::make('sondos'),
            'role_id'=>1

        ]);
    }
}
