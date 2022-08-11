<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Config as ConfigModel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

// use PhpParser\Node\Stmt\Switch_;

class GlobalServiceProvider extends Controller
{
    protected $permissions = '';
    protected $root_name;
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

    public function getProjectNumber()
    {
        $config = $this->getConfig();
        return "{$config->project_prefix}/{$config->enquiry_year}/00{$config->project_number}";
    }

    public function getEmployeeNumber()
    {
        $config = $this->getConfig();
        return "{$config->employee_prefix}-{$config->employee_number}";
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
            case 'PRO':
                $config->project_number += 1;
                $config->save();
                break;
            case 'EMP':
                $config->employee_number += 1;
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

    public function getEmployeePath()
    {
        return 'employees/'.Admin()->id.'/'.Config::get('global.file_path.profile');
    }

    public function bucketStructureFormat($enquiryNumber)
    {
        $rstring = Str::replace('/', '-', $enquiryNumber);
        return Str::lower($rstring);
    }

    public function getBucketFilename($path)
    {
        $removedPath = basename($path);
        return preg_replace('/\\.[^.\\s]{3,4}$/', '', $removedPath);
    }

    public function getSharepointPath($ref='',$folder='')
    {
        return "/DataBase Test/Projects/{$ref}/{$folder}";
    }

    public function getRandomNumber(){
        $randomNumber = random_int(100000, 999999);
        return $randomNumber;
    }

    public function getProposalStatusValue($status) {
        switch ($status) {
            case 'change_request':
                $value = 3;
                break;
            case 'deny':
                $value = 2;
                break;
            case 'approve':
                $value = 1;
                break;
            default:
                $value = 2;
                break;
        }
        return $value;
    }


    public function permissionHtmlView($appPermissions,  $all_permission)
    {
        foreach($appPermissions as $name => $permissions) {
           $this->root_name = $name;
           $this->recursiveHtmlView($name, $permissions, $all_permission);
        }
        return $this->permissions;
    }

    private function recursiveHtmlView($name, $permissions, $all_permission)
    {
        $heading = $name;
        $this->root_name = $name;
        $is_disable = true;
        if(!is_array($permissions)) {
            $this->permissions .= $this->processRow($is_disable, $heading, $name, $all_permission);
        } else {
            $this->permissions .="<tr>";
            foreach($permissions as $key => $permission) {
                $heading = $key;
                if(!is_array($permission)) {
                    $this->permissions .= $this->processRow($is_disable, $heading, $key, $all_permission);
                    $is_disable = false;
                } else { 
                    $this->recursiveHtmlView($heading, $permission,  $all_permission);
                }
            }
        }
    }

    private function processRow($is_disable, $heading, $permission,  $all_permission)
    {
        $row = '';
        if($is_disable) {
            $row .= "<td class='font-weight-bold'> <span class='".config('permission.permission_styles')[$this->root_name]."'>".permissionHeader( $this->root_name )." </span></td>";
        }
        $row .= "<td class='text-center'>
                        <div class='icheckbox_square-blue checked'>
                            <div class='checkbox'> <input ng-model='permissionForm.".$permission."' type='checkbox'
                                    class='form-check-input view_checkbox' value='1'
                                    id='sale_index'  name='".$permission."'  />
                                <label for='sales-index'></label>
                            </div>
                        </div>
                    </td>";
        return $row;
    }
}
