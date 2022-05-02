<?php

namespace App\Helper\Bim360;

use Illuminate\Support\Facades\Route;


class Bim360AccountUser
{
    public $id;
    public $account_id;
    public $status;
    public $role;
    public $company_id;
    public $company_name;
    public $last_sign_in;
    public $email; 
    public $name;
    public $nickname;
    public $first_name;
    public $last_name;
    public $uid;
    public $image_url;
    public $address_line_1;
    public $address_line_2;
    public $city;
    public $state_or_province;
    public $postal_code;
    public $country;
    public $phone;
    public $company;
    public $job_title;
    public $industry;
    public $about_me;
    public $created_at;
    public $updated_at;

    

    function __construct(
        $id,
        $account_id,
        $status,
        $role,
        $company_id,
        $company_name,
        $last_sign_in,
        $email, 
        $name,
        $nickname,
        $first_name,
        $last_name,
        $uid,
        $image_url,
        $address_line_1,
        $address_line_2,
        $city,
        $state_or_province,
        $postal_code,
        $country,
        $phone,
        $company,
        $job_title,
        $industry,
        $about_me,
        $created_at,
        $updated_at
    ) {
        $this->id = $id;
        $this->account_id = $account_id;
        $this->status = $status;
        $this->role = $role;
        $this->company_id = $company_id;
        $this->company_name = $company_name;
        $this->last_sign_in = $last_sign_in;
        $this->email = $email;
        $this->name = $name;
        $this->nickname = $nickname;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->uid = $uid;
        $this->image_url = $image_url;
        $this->address_line_1 = $address_line_1;
        $this->address_line_2 = $address_line_2;
        $this->city = $city;
        $this->state_or_province = $state_or_province;
        $this->postal_code = $postal_code;
        $this->country = $country;
        $this->phone = $phone;
        $this->company = $company;
        $this->job_title = $job_title;
        $this->industry = $industry;
        $this->about_me = $about_me;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    function Validate()
    {
        $errors = array();
        if (empty($this->name)) {
            $errors['name'] = "Name is required.";
        }

        return $errors;
    }

    public function getCreateData()
    {
        $result = array(
            "name" => $this->name,
            "start_date" => $this->start_date,
            "end_date" =>$this->end_date,
            "project_type" => $this->project_type,
            "value" => floatval($this->value),
            "currency" => $this->currency,
            "job_number" => $this->job_number,
            "address_line_1" => $this->address_line_1,
            "address_line_2" => $this->address_line_2,
            "city" => $this->city,
            "state_or_province" => $this->state_or_province,
            "postal_code" => $this->postal_code,
            "country" => $this->country,
            "timezone" => $this->timezone,
            "language" => $this->language,
            "construction_type" => $this->construction_type,
            "contract_type" => $this->contract_type,
        );
        return json_encode($result);
    }

    function __destruct()
    {
    }
}
