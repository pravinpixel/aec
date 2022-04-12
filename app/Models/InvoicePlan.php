<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'project_cost',
        'no_of_invoice',
        'invoice_data',
        'project_id'
    ];
}
