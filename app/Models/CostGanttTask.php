<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostGanttTask extends Model
{
    use HasFactory;
    protected $appends = ["open"];
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",
    ];
 
    public function getOpenAttribute(){
        return true;
    }
}
