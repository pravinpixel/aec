<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    
    public $fillable = [
        'menu_name',
        'parent_name',
        'route_name',
        'icon',
        'order_id'
    ];

    public function moduleMenu()
    {
        return $this->hasOne(ModuleMenu::class);
    }
}
