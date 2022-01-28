<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Type extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'building_types';
    protected $primaryKey = 'id';
    public $fillable = [
        'building_type_name',
        'is_active'
    ];
}
