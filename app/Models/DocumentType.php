<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class DocumentType extends Model
{
    use HasFactory,SoftDeletes;
    public $fillable = [
        'document_type_name',
        'is_mandatory',
        'slug',
        'is_active'
    ];
 
    public static function clean($string) {
        $string = str_replace(' ','_',$string);
        $string = str_replace('&','and',$string);
        $string = preg_replace('/[^A-Za-z0-9\_]/', '', $string);
        return Str::slug($string, '_'); 
    }

    public function setSlugAttribute($value)
    {
        if($value == '3D Models' || $value == '3D Model') {
            $this->attributes['slug'] = "Three_dimensional_model";
        }else {
            $this->attributes['slug'] = Str::of(self::clean($value))->ucfirst();
        }
       
    }

    public function getCreatedAtAttribute($date)
    {
        return  Carbon::parse($date)->format(Config ::get('global.model_date_format'));
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format(Config::get('global.model_date_format'));
    }
}
