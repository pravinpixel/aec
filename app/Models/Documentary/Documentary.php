<?php

namespace App\Models\Documentary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documentary extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'documentary';
    protected $primaryKey = 'id';
    public $fillable = [
        'documentary_title',
        'documentary_content',
        'is_active'
    ];
}
