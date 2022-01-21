<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'layers';
    protected $primaryKey = 'id';
    public $fillable = [
        'layer_name',
      
        'is_active'
    ];
    public function layerTypes()
    {
        return $this->hasMany(LayerType::class,'layer_id','id');
    }
}
