<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutputType extends Model
{
    use HasFactory;

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
