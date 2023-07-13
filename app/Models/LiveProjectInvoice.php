<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveProjectInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'project_id',
        'order_id',
        'order_status',
        'invoice_id',
        'date_invoiced',
        'price',
        'name',
        'quantity',
        'customer_24_id'
    ];
}