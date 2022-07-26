<?php

namespace App\Helper\Bim360;

use Illuminate\Support\Facades\Route;

class Bim360User
{

    public $id;
    public $account_id;
    public $company_id;
    public $company_name;
    public $email;
    public $nickname;
    public $first_name;
    public $last_name;
    public $image_url;
    public $phone;
    public $company;
    public $job_title;
    public $industry;
    public $about_me;
    public $address_line_1;
    public $address_line_2;
    public $city;
    public $state_or_province;
    public $postal_code;
    public $country;
    public $created_at;
    public $updated_at;
    public $last_sign_in;
    public $role;
    public $status;
    public $uid;
    
    function __construct(
        $id,
        $account_id,
        $company_id,
        $company_name,
        $email,
        $nickname,
        $first_name,
        $last_name,
        $image_url,
        $phone,
        $company,
        $job_title,
        $industry,
        $about_me,
        $address_line_1,
        $address_line_2,
        $city,
        $state_or_province,
        $postal_code,
        $country,
        $created_at,
        $updated_at,
        $last_sign_in,
        $role,
        $status,
        $uid
    ) {
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
        $email,
        $company_id,
        $nickname,
        $first_name,
        $last_name,
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
        $about_me
    ) {
        $result = array(
            "email" => $email,
            "company_id" => $company_id,
            "nickname" => $nickname,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "image_url" => $image_url,
            "phone" => $phone,
            "address_line_1" => $address_line_1,
            "address_line_2" => $address_line_2,
            "city" => $city,
            "state_or_province" => $state_or_province,
            "postal_code" => $postal_code,
            "country" => $country,
            "company" => $company,
            "job_title" => $job_title,
            "industry" => $industry,
            "about_me" => $about_me
        );
        return json_encode($result);
    }

    public static function getEditData(
        $id,
        $email,
        $company_id,
        $nickname,
        $first_name,
        $last_name,
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
        $about_me
    ) {
        $result = array(
            "id" => $id,
            "email" => $email,
            "company_id" => $company_id,
            "nickname" => $nickname,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "image_url" => $image_url,
            "phone" => $phone,
            "address_line_1" => $address_line_1,
            "address_line_2" => $address_line_2,
            "city" => $city,
            "state_or_province" => $state_or_province,
            "postal_code" => $postal_code,
            "country" => $country,
            "company" => $company,
            "job_title" => $job_title,
            "industry" => $industry,
            "about_me" => $about_me
        );
        return json_encode($result);
    }


    function __destruct()
    {
    }
}
