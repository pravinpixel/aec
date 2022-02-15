<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Config as ConfigModel;
use Illuminate\Support\Facades\Config;

// use PhpParser\Node\Stmt\Switch_;

class GlobalServiceProvider extends Controller
{
   
    public function getMenus()
    {
        
    }

    public function enquiryNumber()
    {
        $config = $this->getConfig();
        return "{$config->enquiry_prefix}/{$config->enquiry_year}/00{$config->enquiry_number}";
    }

    public function customerEnquiryNumber()
    {
        $config = $this->getConfig();
        return "{$config->customer_prefix}/{$config->enquiry_year}/00{$config->customer_enquiry_number}";
    }

    public function getConfig()
    {
        return ConfigModel::first();
    }

    public function updateConfig($type)
    {
        $config = $this->getConfig();
        switch ($type) {
            case 'ENQ':
                $config->enquiry_number += 1;
                $config->save();
                break;
            case 'CENQ':
                $config->customer_enquiry_number += 1;
                $config->save();
                break;
            default:
                
                break;
        }
    }

    public function dateFormat($date) 
    {
        $format = Config::get('global.model_date_format');
        return Carbon::parse($date)->format($format);
    }

    public function DBDateFormat($date)
    {
        $format = Config::get('global.db_date_format');
        return Carbon::parse($date)->format($format);
    }

    public function DBDateFormatWithTime($date)
    {
        $format = Config::get('global.db_date_format_with_time');
        return Carbon::parse($date)->format($format);
    }

    public function getBuildingComponentPath()
    {
        return 'customers/'.Customer()->id.'/'.Config::get('global.file_path.building_component_uploads');
    }

    public function getIfcmodelPath()
    {
        return 'customers/'.Customer()->id.'/'.Config::get('global.file_path.ifc_model_uploads');
    }
}
