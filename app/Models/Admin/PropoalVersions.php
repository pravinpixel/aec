<?php

namespace App\Models\Admin;

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
        'is_active',
    ];  
//     public function getJoinVersions()
//     {
//         return  $this->hasOne(MailTemplate::class,  'proposal_id', 'proposal_id');
//     }
}