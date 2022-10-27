<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutputType extends Model
{
    use HasFactory,SoftDeletes;
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    
    public $fillable = [
        'output_type_name',
        'order_id',
        'is_active'
    ];
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
