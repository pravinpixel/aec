<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryBuildingComponentLayer extends Model
{
    use HasFactory;

    public function layerType()
    {
        return $this->belongsTo(LayerType::class);
    }

    public function layer()
    {
        return $this->belongsTo(Layer::class);
    }
}
