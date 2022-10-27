<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTeamSetup extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'role_id',
        'team'
    ];
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",  
    ];
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function getTeamAttribute()
    {
        return json_decode($this->attributes['team']);
    }
}
