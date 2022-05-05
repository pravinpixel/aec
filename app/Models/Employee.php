<?php


namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'first_Name',
        'last_name',
        'user_name',
        'password',
        'job_role',
        'number',
        'email',
        'image',
        'status',
        'share_access',
        'bim_access',
        'bim_id',
        'bim_account_id',
        'bim_uid',
        'access',
        'device_token',
        'notification',
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

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'job_role');
    }
}
