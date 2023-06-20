<?php

namespace Database\Seeders;

use App\Models\Admin\Employees;
use App\Models\AecUsers;
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
        $aec_user = AecUsers::create([
            'first_name'       => 'Arun',
            'last_name'        => 'kalyan',
            'full_name'     => 'Arun kalyan',
            'email'            => 'arun.kalyan@aecprefab.net',
            'password'         => Hash::make('12345678'),
            'image'                 => "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png",
            'job_role'         => 1,
        ]);
        Employees::create([
            'aec_user_id' => $aec_user->id,
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
        $aec_user_2 = AecUsers::create([
            'first_name'       => 'Super',
            'last_name'        => 'Admin',
            'full_name'     => 'Super Admin',
            'email'            => 'admin@aecprefab.net',
            'password'         => Hash::make('12345678'),
            'image'            => "https://picsum.photos/200",
            'job_role'         => 1,
        ]);
        Employees::create([
            'aec_user_id' => $aec_user_2->id,
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
        $aec_user_3 = AecUsers::create([
            'first_name'       => 'Rosan',
            'last_name'        => '2',
            'full_name'     => 'ki',
            'email'            => 'aecadmnusr2@gmail.com',
            'password'         => Hash::make('12345678'),
            'image'            => "https://picsum.photos/200",
            'job_role'         => 1,
        ]);
        Employees::create([
            'aec_user_id' => $aec_user_3->id,
            'first_name'       => 'Rosan',
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
        $aec_user_4 = AecUsers::create([
            'first_name'       => 'denial',
            'last_name'        => 'dev',
            'full_name'     => 'denial',
            'email'            => 'denial@aecprefab.net',
            'password'         => Hash::make('12345678'),
            'image'            => "https://picsum.photos/200",
            'job_role'         => 5,
        ]);
        Employees::create([
            'aec_user_id' => $aec_user_4->id,
            'first_name'       => 'denial',
            'last_name'        => 'dev',
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
