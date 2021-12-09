<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Config;
use PhpParser\Node\Stmt\Switch_;

class GlobalServiceProvider extends Controller
{
   
    public function getMenus()
    {
        
    }

    public function enquiryNumber()
    {
        $config = $this->getConfig();
        return "{$config->enquiry_prefix}-{$config->enquiry_number}";
    }

    public function getConfig()
    {
        return Config::first();
    }

    public function updateConfig($type)
    {
        $config = $this->getConfig();
        switch ($type) {
            case 'ENQ':
                $config->enquiry_number += 1;
                $config->save();
                break;
            default:
                # code...
                break;
        }
    }
}
