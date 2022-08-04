<?php

namespace Database\Seeders;

use App\Models\Admin\Employees;
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
        $admin = Employees::create([
            'first_name' => 'aec',
            'last_name' => 'admin',
            'user_name' => 'aecprefab admin',
            'email' => 'admin@aecprefab.net',
            'password' => Hash::make('12345678'),
            'mobile_number' => '98786756',
            // 'share_access' => 1, 
            'bim_access' => 1, 
            // 'access' => 1, 
            'status' => 1,
            'image' => '',
            'job_role' => 1,
            'reference_number' => 'EMP-1',
        ]);
    }
}