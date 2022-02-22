<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryComments extends Model
{
    use HasFactory;

    protected $fillable = ['enquiry_id', 'type', 'created_by', 'comments', 'file_id', 'status', 'seen_by', 'role_by'];
 
}
