<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckSheet extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",
    ];

    protected $fillable = [
        'name',
        'is_active',
    ];

    public function CheckList(){
        return $this->hasMany(CheckList::class, 'task_list_category', 'id');
    }
}
