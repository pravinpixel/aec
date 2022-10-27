<?php

namespace App\Models;

use App\Http\Controllers\sharePointFolderMasterController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectsFolders extends Model
{
    use HasFactory;
    protected $table="projects_folders";
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",  
    ];
}
