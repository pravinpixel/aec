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
        DocumentType::create(['document_type_name' => 'Plan view' , 'is_active' => 1]);
        DocumentType::create(['document_type_name' => 'Facade view' , 'is_active' => 1]);
        DocumentType::create(['document_type_name' => 'IFC model' , 'is_active' => 1]);
        DocumentType::create(['document_type_name' => 'Others' , 'is_active' => 1]);
    }
}
