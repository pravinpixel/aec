<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryProposal extends Model
{
    use HasFactory;
    protected $fillable = [
        'enquiry_id',
        'title',
        'parent',
        'version', 
        'comments',
        'content',
        'admin_status',
        'customer_status',
        'mailed_at',
        'created_by'
    ];

    public function child() {
        return $this->hasMany(EnquiryProposal::class, 'parent', 'id')->latest();
    }

    public function Enquiry() {
        return $this->hasOne(Enquiry::class, 'id', 'enquiry_id')->latest();
    }
}
