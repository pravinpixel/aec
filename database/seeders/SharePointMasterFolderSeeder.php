<?php

namespace Database\Seeders;

use App\Models\sharePointMasterFolder;
use Illuminate\Database\Seeder;

class SharePointMasterFolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sharePointMasterFolder::create([
            'name' => 'Customer Input',
            'status' => '1'
        ]);
    }
}
