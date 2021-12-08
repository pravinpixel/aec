<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'module_name',
        'parent_name',
        'icon',
        'order_id',
        'is_active'
    ];

    public $hidden = [
        'deleted_at'
    ];

    public function moduleMenu()
    {
        return $this->hasOne(ModuleMenu::class);
    }
}
