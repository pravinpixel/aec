<?php

namespace Database\Seeders;

use App\Models\CheckSheet;
use Illuminate\Database\Seeder;

class CheckSheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CheckSheet::create(['name' => 'CABIN PROJECTS', 'is_active' => 1]);
        CheckSheet::create(['name' => 'MULTISTOREY FACADE PROJECT', 'is_active' => 1]);
        CheckSheet::create(['name' => 'STRUCTURAL DESIGN INSTALLATION DRAWING', 'is_active' => 1]);
    }
}
