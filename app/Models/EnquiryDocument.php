<?php

namespace App\Models;

use App\Services\GlobalService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EnquiryDocument extends Pivot
{
    use HasFactory;

}
