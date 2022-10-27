<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",  
    ];
    public $fillable = [
        'service_name',
        'is_active',
        'output_type_id',
    ];

    public function enquiries()
    {
        return $this->belongsToMany(Enquiry::class);
    }

    public function outputType()
    {
        return $this->belongsTo(OutputType::class);
    }
}
