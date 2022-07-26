<?php

namespace Database\Seeders;

use App\Models\CheckList;
use Illuminate\Database\Seeder;

class CheckListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        CheckList::insert([
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "1", 'task_list' => "GA Drawing", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "1", 'task_list' => "2D Connection Detail Drawing", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "1", 'task_list' => "Structural Element Drawing", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "1", 'task_list' => "Foundation Concrete Drawing(optional)", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "1", 'task_list' => "window and door legend drawings", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "2", 'task_list' => "External and Internal wall Fabrication drawings", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "2", 'task_list' => "Floor Fabrication drawings", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "2", 'task_list' => "Roof Fabrication drawings", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "2", 'task_list' => "Beam and column manufacturing drawings", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "3", 'task_list' => "External and Internal wall Fabrication drawings", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "3", 'task_list' => "Floor Fabrication drawings", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "3", 'task_list' => "Roof Fabrication drawings", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "3", 'task_list' => "3D Installation drawings ( optional)", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "3", 'task_list' => "Total Material List(Timber and steel components)", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "3", 'task_list' => "Foundation sill Drawings)", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "3", 'task_list' => "Transport Packaging Drawing(client Optional)", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "3", 'task_list' => "CNC DATA (client Optional)", 'is_active' => 1],
            ['name'=>"CABIN PROJECTS" ,'task_list_category' => "3", 'task_list' => "Find set of drawings uploaded in BIM 360", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "1", 'task_list' => "Facade wall Layout", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "1", 'task_list' => "2D connecting Detail Drawings", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "4", 'task_list' => "Global Structural Reports", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "5", 'task_list' => "Facade wall Framing", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "5", 'task_list' => "Total Building Material List", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "6", 'task_list' => "Facade wall Installation drawing", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "6", 'task_list' => "Transport Packaging drawing", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "6", 'task_list' => "CNC DATA", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "6", 'task_list' => "Facade wall fabrication drawing", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "7", 'task_list' => "Final set of drawing uploaded in BIM 360", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "7", 'task_list' => "Maintaining BIM dat for every Update", 'is_active' => 1],
            ['name'=>"MULTISTOREY FACADE PROJECT" ,'task_list_category' => "7", 'task_list' => "Maintaining BIM dat for every Update", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Dead Load Calculation", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of Beam", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of Column", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "share wall Design", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of Anchorage in shear wall", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Roof Design", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of pullout strength of screw", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of anchorage Bolt for wall", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of Angle Bar", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of Element", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of Pullout strength of screw for wall", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of Anchorage Bolt", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of Connection Between column and beam", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of Angle Bar for Glulam", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of pullout strength of screw for Glulam", 'is_active' => 1],
            ['name'=>"STRUCTURAL DESIGN INSTALLATION DRAWING" ,'task_list_category' => "8", 'task_list' => "Design of column Base Connection", 'is_active' => 1], 
        ]);
    }
} 