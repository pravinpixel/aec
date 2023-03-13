<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_id',
        'remarks',
        'title',
        'status',
        'description',
        'attachments',
        'type',
        'request_id',
        'request_name',
        'assignee_id',
        'assignee_name',
        'priority',
        'due_date',
        'tags',
        'convert_variation_order'
    ];
    public function IssuesAttachments()
    {
        return $this->hasMany(IssuesAttachments::class,'issue_id','id');
    }

    public function IssueComments()
    {
        return $this->hasMany(IssueComments::class,'issue_id','id');
    }

    public function VariationOrder()
    {
        return $this->hasOne(VariationOrder::class,'issue_id','id');
    }
}
