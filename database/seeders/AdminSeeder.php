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
            'display_name' => 'aecprefab admin',
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
        $admin = Employees::create([
            'first_name' => 'aecadmnusr',
            'last_name' => '2',
            'user_name' => 'Alan',
            'display_name' => 'Alan',
            'email' => 'aecadmnusr1@gmail.com',
            'password' => Hash::make('12345678'),
            'mobile_number' => '98786757',
            // 'share_access' => 1, 
            'bim_access' => 1, 
            // 'access' => 1, 
            'status' => 1,
            'image' => '',
            'job_role' => 1,
            'reference_number' => 'EMP-2',
        ]);
        $admin = Employees::create([
            'first_name' => 'aecadmnusr',
            'last_name' => '2',
            'user_name' => 'Rosan',
            'display_name' => 'Rosan',
            'email' => 'aecadmnusr2@gmail.com',
            'password' => Hash::make('12345678'),
            'mobile_number' => '98786758',
            // 'share_access' => 1, 
            'bim_access' => 1, 
            // 'access' => 1, 
            'status' => 1,
            'image' => '',
            'job_role' => 1,
            'reference_number' => 'EMP-3',
        ]);

        $admin = Employees::create([
            'first_name' => 'denial',
            'last_name' => 'dev',
            'user_name' => 'denial',
            'display_name' => 'denial',
            'email' => 'denial@aecprefab.net',
            'password' => Hash::make('12345678'),
            'mobile_number' => '98786759',
            // 'share_access' => 1, 
            'bim_access' => 1, 
            // 'access' => 1, 
            'status' => 1,
            'image' => '',
            'job_role' => 5,
            'reference_number' => 'EMP-4',
        ]);
    }
}