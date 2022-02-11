<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\SharePointAcess;
class SharePointAcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SharePointAcess::create(['folder_name' => "Administration-Document",'is_active' => 1]);
        SharePointAcess::create(['folder_name' => "Business Development",'is_active' => 1]);
        SharePointAcess::create(['folder_name' => "Sales-Document",'is_active' => 1]);
        SharePointAcess::create(['folder_name' => "Projects-Documents",'is_active' => 1]);
        SharePointAcess::create(['folder_name' => "Engineering-Documents",'is_active' => 1]);
        SharePointAcess::create(['folder_name' => "Subsea Projects-Documents",'is_active' => 1]);
    }
}
