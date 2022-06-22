<?php

namespace App\Models\Admin;

use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropoalVersions extends Model
{
    use HasFactory;
    public $fillable = [
        'parent_id',
        'proposal_id',
        'enquiry_id',
        'documentary_id',
        'documentary_date',
        'mail_send_date',
        'documentary_content',
        'pdf_file_name',
        'is_mail_sent',
        'status',
        'version',
        'template_name',
        'comment',
        'is_active',
        'proposal_status',
    ];  

    public function enquiryProposal()
    {
        return  $this->belongsTo(MailTemplate::class,  'proposal_id', 'proposal_id');
    }

    public function enquiry()
    {
        return  $this->belongsTo(Enquiry::class, 'enquiry_id','id');
    } 
}