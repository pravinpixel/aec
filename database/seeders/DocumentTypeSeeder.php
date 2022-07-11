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
        DocumentType::create(['document_type_name' => 'Drawings' , 'slug' => 'Drawings', 'is_active' => 1]);
        DocumentType::create(['document_type_name' => '3D Model' ,'slug' => 'Three_dimensional_model', 'is_active' => 1]);
        DocumentType::create(['document_type_name' => 'Foundation Drawings & Other' ,'slug' => 'Foundation_drawings_and_other', 'is_active' => 1]);
    }
}
