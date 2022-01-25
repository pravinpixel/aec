<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLayer extends Model
{
    use HasFactory;

    public function setCustomerIdAttribute($value)
    {
        $this->attributes['customer_id'] = Customer()->id;
    }

    public function layer()
    {
        return $this->belongsTo(Layer::class)->buildingComponents();
    }
}
