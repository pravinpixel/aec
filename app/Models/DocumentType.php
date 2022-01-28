<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
{
    use HasFactory,SoftDeletes;
    public $fillable = [
        'document_type_name',
        'is_mandatory',
        'slug',
        'is_active'
    ];
    public function getCreatedAtAttribute($date)
    {
        return  Carbon::parse($date)->format(Config ::get('global.model_date_format'));
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format(Config::get('global.model_date_format'));
    }
}
