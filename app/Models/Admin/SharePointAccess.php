<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SharePointAccess extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey = 'id';
    public $fillable = [
        'folder_name',
        'is_active',
        'data_name',
    ]; 
}
