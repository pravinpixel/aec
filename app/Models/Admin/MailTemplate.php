<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailTemplate extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'enquiry_proposal';

    protected $primaryKey = 'proposal_id';
    public $fillable = [
        'enquirie_id',
        'documentary_id',
        'template_name',
        'documentary_content',
        'documentary_date',
        'pdf_file_name',
        'version',
        'reference_no',
        'is_mail_sent',
        'is_active',
        'status',
    ];
}
