<?php

namespace Database\Seeders;

use App\Models\OutputType;
use Illuminate\Database\Seeder;

class OutputTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OutputType::create(['output_type_name' => 'Timber Frame', 'is_active' => 1]);
        OutputType::create(['output_type_name' => 'Precast', 'is_active' => 1]);
    }
}
