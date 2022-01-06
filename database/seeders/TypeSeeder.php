<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(['type_name' => 'Panel', 'order_id'=> 1,'is_active' => 1]);
        Type::create(['type_name' => 'Precut',  'order_id'=> 2,'is_active' => 1]);
        Type::create(['type_name' => 'Structural precut', 'order_id'=> 3, 'is_active' => 1]);
       
    }
}
