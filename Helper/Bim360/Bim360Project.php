<?php

namespace App\Helper\Bim360;

use Illuminate\Support\Facades\Route;

$Bim360ProjectStatus = array(
    "active" => "project is active with at least one project admin added",
    "pending" => "project has been created but pending becuase no project admin added",
    "inactive" => "project is suspended",
    "archived" => "project is archived and displayed only in the archived list"
);


class Bim360Project
{
    public $id;
    public $account_id;
    public $name;
    public $start_date;
    public $end_date;
    public $project_type;
    public $value;
    public $currency;
    public $status;
    public $job_number;
    public $address_line_1;
    public $address_line_2;
    public $city;
    public $state_or_province;
    public $postal_code;
    public $country;
    public $business_unit_id;
    public $timezone;
    public $language;
    public $construction_type;
    public $contract_type;
    public $last_sign_in;
    public $copy_project_job_id;
    public $created_at;
    public $updated_at;

    public $service_types;
    public $template_project_id;
    public $include_companies;
    public $include_locations;


    function __construct(
        $id,
        $account_id,
        $name,
        $start_date,
        $end_date,
        $project_type,
        $value,
        $currency,
        $status,
        $job_number,
        $address_line_1,
        $address_line_2,
        $city,
        $state_or_province,
        $postal_code,
        $country,
        $business_unit_id,
        $timezone,
        $language,
        $construction_type,
        $contract_type,
        $last_sign_in,
        $copy_project_job_id,
        $created_at,
        $updated_at,
        $service_types,
        $template_project_id,
        $include_companies,
        $include_locations
    ) {
        // $this->id = $id;
        // $this->account_id = $account_id;
        // $this->name = $name;
        // $this->start_date = $start_date;
        // $this->end_date = $end_date;
        // $this->project_type = $project_type;
        // $this->value = $value;
        // $this->currency = $currency;
        // $this->status = $status;
        // $this->job_number = $job_number;
        // $this->address_line_1 = $address_line_1;
        // $this->address_line_2 = $address_line_2;
        // $this->city = $city;
        // $this->state_or_province = $state_or_province;
        // $this->postal_code = $postal_code;
        // $this->country = $country;
        // $this->business_unit_id = $business_unit_id;
        // $this->timezone = $timezone;
        // $this->language = $language;
        // $this->construction_type = $construction_type;
        // $this->contract_type = $contract_type;
        // $this->last_sign_in = $last_sign_in;
        // $this->copy_project_job_id = $copy_project_job_id;
        // $this->created_at = $created_at;
        // $this->updated_at = $updated_at;
        // $this->$service_types = $service_types;
        // $this->$template_project_id = $template_project_id;
        // $this->$include_companies = $include_companies;
        // $this->$include_locations = $include_locations;
    }

    function Validate()
    {
        $errors = array();
        if (empty($this->name)) {
            $errors['name'] = "Name is required.";
        }

        return $errors;
    }

    public static function getCreateData(
        $name,
        $start_date,
        $end_date,
        $project_type,
        $value,
        $currency,
        $job_number,
        $address_line_1,
        $address_line_2,
        $city,
        $state_or_province,
        $postal_code,
        $country,
        $timezone,
        $language,
        $construction_type,
        $contract_type
    ) {
        $result = array(
            "name" => $name,
            "start_date" => $start_date,
            "end_date" => $end_date,
            "project_type" => $project_type,
            "value" => floatval($value),
            "currency" => $currency,
            "job_number" => $job_number,
            "address_line_1" => $address_line_1,
            "address_line_2" => $address_line_2,
            "city" => $city,
            "state_or_province" => $state_or_province,
            "postal_code" => $postal_code,
            "country" => $country,
            "timezone" => $timezone,
            "language" => $language,
            "construction_type" => $construction_type,
            "contract_type" => $contract_type,
        );
        return json_encode($result);
    }
    
    public static function getEditData(
        $id,
        $name,
        $start_date,
        $end_date,
        $project_type,
        $value,
        $currency,
        $job_number,
        $address_line_1,
        $address_line_2,
        $city,
        $state_or_province,
        $postal_code,
        $country,
        $timezone,
        $language,
        $construction_type,
        $contract_type
    ) {
        $result = array(
            "id" => $id,
            "name" => $name,
            "start_date" => $start_date,
            "end_date" => $end_date,
            "project_type" => $project_type,
            "value" => floatval($value),
            "currency" => $currency,
            "job_number" => $job_number,
            "address_line_1" => $address_line_1,
            "address_line_2" => $address_line_2,
            "city" => $city,
            "state_or_province" => $state_or_province,
            "postal_code" => $postal_code,
            "country" => $country,
            "timezone" => $timezone,
            "language" => $language,
            "construction_type" => $construction_type,
            "contract_type" => $contract_type,
        );
        return json_encode($result);
    }
    

    function __destruct()
    {
    }
}
