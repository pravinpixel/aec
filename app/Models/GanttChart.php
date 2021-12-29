<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GanttChart extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'gantt_chart';
    protected $primaryKey = 'id';
    protected $fillable = [
        'text',
        'start_date',
        'duration',
        'status'
        
    ];
}
