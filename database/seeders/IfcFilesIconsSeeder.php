<?php

namespace Database\Seeders;

use App\Models\IfcFilesIcons;
use Illuminate\Database\Seeder;

class IfcFilesIconsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IfcFilesIcons::create([ 'type' => 'png','icon' => 'https://cdn-icons-png.flaticon.com/512/861/861319.png']);
        IfcFilesIcons::create([ 'type' => 'jpg','icon' => 'https://cdn-icons-png.flaticon.com/512/861/861319.png']);
        IfcFilesIcons::create([ 'type' => 'jpeg','icon' => 'https://cdn-icons-png.flaticon.com/512/861/861319.png']);
        IfcFilesIcons::create([ 'type' => 'link','icon' => 'https://cdn-icons-png.flaticon.com/512/861/861319.png']);
        IfcFilesIcons::create([ 'type' => 'pdf','icon' => 'https://cdn-icons-png.flaticon.com/512/861/861319.png']);
        IfcFilesIcons::create([ 'type' => 'xls','icon' => 'https://cdn-icons-png.flaticon.com/512/861/861319.png']);
        IfcFilesIcons::create([ 'type' => 'xlsx','icon' => 'https://cdn-icons-png.flaticon.com/512/861/861319.png']);
        IfcFilesIcons::create([ 'type' => 'ifc','icon' => 'https://cdn-icons-png.flaticon.com/512/861/861319.png']);
    }
}
