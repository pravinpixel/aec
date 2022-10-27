<?php

namespace App\Models\Documentary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documentary extends Model
{
    use HasFactory, SoftDeletes;
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",
    ];
    protected $table = 'documentary';
    protected $primaryKey = 'id';
    public $fillable = [
        'documentary_title',
        'documentary_content',
        'is_active'
    ];
}
