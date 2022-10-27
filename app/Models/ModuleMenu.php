<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleMenu extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    
}
