<?php

namespace App\Models\Admin;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Employees extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles,SoftDeletes;

    protected $fillable =[
        'id',
        'reference_number',
        'employee_id',
        'first_name',
        'last_name',
        'display_name',
        'user_name',
        'domains',
        'email',
        'location',
        'job_title',
        'department',
        'mobile_number',
        'recipient_email',
        'sign_in_password_change',
        'send_password_to_email',
        'password',
        'job_role',
        'image',
        'status',
        'bim_access',
        'bim_id',
        'bim_account_id',
        'bim_uid',
        'completed_wizard',
        'created_by',
        'country_code'
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setFullNameAttribute()
    {
        $this->attributes['full_name'] = "{$this->attributes['first_name']} {$this->attributes['last_name']}";
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'job_role');
    }
 

    public function assigndetails()
    {
        return $this->hasOne(Employees::class,'id','assigned');
    }

    public function requesterdetails()
    {
        return $this->hasOne(Employees::class,'id','send_by');
    }
        

}
