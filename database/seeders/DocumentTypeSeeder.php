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
        DocumentType::create(['document_type_name' => 'Drawings' , 'slug' => 'drawings', 'is_active' => 1]);
        DocumentType::create(['document_type_name' => '3D Model' ,'slug' => 'd_model', 'is_active' => 1]);
        DocumentType::create(['document_type_name' => 'Foundation Drawings & Other' ,'slug' => 'foundation_drawings_other', 'is_active' => 1]);
    }
}
