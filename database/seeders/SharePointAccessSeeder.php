<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\SharePointAccess;
class SharePointAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SharePointAccess::create(['folder_name' => "Administration-Document",'is_active' => 1,'data_name'=>"administration_status"]);
        SharePointAccess::create(['folder_name' => "Business Development",'is_active' => 1,'data_name'=>"business_status"]);
        SharePointAccess::create(['folder_name' => "Sales-Document",'is_active' => 1,'data_name'=>"sales_status"]);
        SharePointAccess::create(['folder_name' => "Projects-Documents",'is_active' => 1,'data_name'=>"projects_status"]);
        SharePointAccess::create(['folder_name' => "Engineering-Documents",'is_active' => 1,'data_name'=>"engineering_status"]);
        SharePointAccess::create(['folder_name' => "Subsea Projects-Documents",'is_active' => 1,'data_name'=>"subsea_projects_status"]);
    }
}
