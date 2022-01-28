<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutputType extends Model
{
    use HasFactory,SoftDeletes;
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
