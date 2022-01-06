<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Type extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'type';
    protected $primaryKey = 'id';
    public $fillable = [
        'type_name',
        'order_id',
        'is_active'
    ];
}
