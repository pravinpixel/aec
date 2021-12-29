<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentType::create(['document_type_name' => 'Plan view' , 'slug' => 'plan_view', 'is_active' => 1]);
        DocumentType::create(['document_type_name' => 'Facade view' , 'slug' => 'facade_view', 'is_active' => 1]);
        DocumentType::create(['document_type_name' => 'IFC model' ,'slug' => 'ifc_model', 'is_active' => 1]);
        DocumentType::create(['document_type_name' => 'Others' ,'slug' => 'others', 'is_active' => 1]);
    }
}
