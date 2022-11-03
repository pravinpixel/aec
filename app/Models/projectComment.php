<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectComment extends Model
{
    use HasFactory;
    protected $fillable=['body','project_id','commentable_id','commentable_type'];
    public function commentable(){
        return $this->morphTo();
    }
}