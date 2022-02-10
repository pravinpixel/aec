<?php

namespace Database\Seeders;

use App\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'first_name' => 'aec',
            'last_name' => 'admin',
            'full_name' => 'aecprefab admin',
            'email' => 'admin@aecprefab.com',
            'password' => Hash::make('12345678'),
            'mobile_no' => '98786756',
            'gender' => 'male', 
            'is_active' => 1,
        ]);
    }
}