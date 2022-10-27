<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryBuildingComponentLayer extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    
    public function layerType()
    {
        return $this->belongsTo(LayerType::class);
    }

    public function layer()
    {
        return $this->belongsTo(Layer::class);
    }
}
