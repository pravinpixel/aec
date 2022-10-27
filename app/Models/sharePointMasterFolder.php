<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sharePointMasterFolder extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','status'
    ];
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",  
    ];
    public function projects(){
        return $this->belongsToMany(projects::class,'projects_folders','fid','pid');
    }
}
