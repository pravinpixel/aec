<?php

namespace Database\Seeders;

use App\Models\Admin\Employees;
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
        Employees::create([
            'first_name'       => 'Arun',
            'last_name'        => 'kalyan',
            'user_name'        => 'arun',
            'full_name'     => 'Arun kalyan',
            'email'            => 'arun.kalyan@aecprefab.net',
            'password'         => Hash::make('12345678'),
            'mobile_number'    => '98786756',
            'bim_access'       => 1,
            'status'           => 1,
            'image'            => '',
            'job_role'         => 1,
            'reference_number' => 'EMP-1',
            'image'            => "https://picsum.photos/200"
        ]);
        Employees::create([
            'first_name'       => 'Super',
            'last_name'        => 'Admin',
            'user_name'        => 'Admin',
            'full_name'     => 'Super Admin',
            'email'            => 'admin@aecprefab.net',
            'password'         => Hash::make('12345678'),
            'mobile_number'    => '98786757',
            'bim_access'       => 1,
            'status'           => 1,
            'image'            => '',
            'job_role'         => 1,
            'reference_number' => 'EMP-2',
            'image'            => "https://picsum.photos/200"
        ]);
        Employees::create([
            'first_name'       => 'aecadmnusr',
            'last_name'        => '2',
            'user_name'        => 'Rosan',
            'full_name'     => 'Rosan',
            'email'            => 'aecadmnusr2@gmail.com',
            'password'         => Hash::make('12345678'),
            'mobile_number'    => '98786758',
            'bim_access'       => 1,
            'status'           => 1,
            'image'            => '',
            'job_role'         => 1,
            'reference_number' => 'EMP-3',
            'image'            => "https://picsum.photos/200"
        ]);

        Employees::create([
            'first_name'       => 'denial',
            'last_name'        => 'dev',
            'user_name'        => 'denial',
            'full_name'     => 'denial',
            'email'            => 'denial@aecprefab.net',
            'password'         => Hash::make('12345678'),
            'mobile_number'    => '98786759',
            'bim_access'       => 1,
            'status'           => 1,
            'image'            => '',
            'job_role'         => 5,
            'reference_number' => 'EMP-4',
            'image'            => "https://picsum.photos/200"
        ]);
    }
}