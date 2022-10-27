<?php

namespace Database\Seeders;

use App\Models\SharepointFolder;
use App\Models\sharePointMasterFolder;
use Illuminate\Database\Seeder;

class masterFolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $folders=[
            ['name'=>'folder1','status'=>'0'],
            ['name'=>'diff','status'=>'1'],
            ['name'=>'diagrams','status'=>'1'],
            ['name'=>'graphs','status'=>'1'],
            ['name'=>'engineering','status'=>'0'],
            ['name'=>'my folder','status'=>'1'],
            ['name'=>'new folder','status'=>'1'],
           ];
           foreach($folders as $folder){
               sharePointMasterFolder::create($folder);
           }
    }
}
