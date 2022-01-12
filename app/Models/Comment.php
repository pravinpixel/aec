<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comments',
        'type',
        'type_id',
        'created_by',
        'updated_by'
    ];

    public function getCreatedAtAttribute($date)
    {
        return  Carbon::parse($date)->format(Config::get('global.model_date_format'));
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'created_by', 'id');
    }
}
