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
        'building_component_id',
        'user_type',
        'created_by',
        'is_active'
    ];
    public function layerTypes()
    {
        return $this->hasMany(LayerType::class,'layer_id','id');
    }

    public function customerLayers()
    {
        return $this->hasMany(CustomerLayer::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class,'customer_layer','layer_id','customer_id');
    }
}
