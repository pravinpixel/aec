<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\Config;

class DocumentTypeEnquiry extends Pivot
{
    use HasFactory;

    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",
    ];

    public function getCreatedAtAttribute($date)
    {
        return  Carbon::parse($date)->format(Config::get('global.model_date_format'));
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format(Config::get('global.model_date_format'));
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class,'document_type_id', 'id');
    }
    
}
