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
    public function projects(){
        return $this->belongsToMany(projects::class,'projects_folders','fid','pid');
    }
}
