<?php

namespace App\Helper\Bim360;

use Illuminate\Support\Facades\Route;

class Bim360Company
{
    // {
    // 	"name": "Jaguars",
    // 	"trade": "Concrete",
    // 	"address_line_1": "The Fifth Avenue",
    // 	"address_line_2": "#303",
    // 	"city": "New York",
    // 	"postal_code": "10011",
    // 	"state_or_province": "New York",
    // 	"country": "United States",
    // 	"phone": "(634)329-2353",
    // 	"website_url": "http://www.autodesk.com"
    // 	"description":"Jaguars is the world\"s largest concrete company."
    // 	"erp_id":"c79bf096-5a3e-41a4-aaf8-a771ed329047",
    // 	"tax_id":"413-07-5767"
    //   }
    public $id;
    public $account_id;
    public $name;
    public $trade;
    public $phone;
    public $website_url;
    public $description;
    public $erp_id;
    public $tax_id;
    public $address_line_1;
    public $address_line_2;
    public $city;
    public $state_or_province;
    public $postal_code;
    public $country;
    public $business_unit_id;
    public $created_at;
    public $updated_at;


    function __construct(
        $id,
        $account_id,
        $name,
        $trade,
        $phone,
        $website_url,
        $description,
        $erp_id,
        $tax_id,
        $address_line_1,
        $address_line_2,
        $city,
        $state_or_province,
        $postal_code,
        $country,
        $created_at,
        $updated_at
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
        $name,
        $trade,
        $phone,
        $website_url,
        $description,
        $erp_id,
        $tax_id,
        $address_line_1,
        $address_line_2,
        $city,
        $state_or_province,
        $postal_code,
        $country
    ) {
        $result = array(
            "name" => $name,
            "trade" => $trade,
            "phone" => $phone,
            "website_url" => $website_url,
            "description" => $description,
            "erp_id" => $erp_id,
            "tax_id" => $tax_id,
            "address_line_1" => $address_line_1,
            "address_line_2" => $address_line_2,
            "city" => $city,
            "state_or_province" => $state_or_province,
            "postal_code" => $postal_code,
            "country" => $country
        );
        return json_encode($result);
    }

    public static function getEditData(
        $id,
        $name,
        $trade,
        $phone,
        $website_url,
        $description,
        $erp_id,
        $tax_id,
        $address_line_1,
        $address_line_2,
        $city,
        $state_or_province,
        $postal_code,
        $country
    ) {
        $result = array(
            "id" => $id,
            "name" => $name,
            "trade" => $trade,
            "phone" => $phone,
            "website_url" => $website_url,
            "description" => $description,
            "erp_id" => $erp_id,
            "tax_id" => $tax_id,
            "address_line_1" => $address_line_1,
            "address_line_2" => $address_line_2,
            "city" => $city,
            "state_or_province" => $state_or_province,
            "postal_code" => $postal_code,
            "country" => $country
        );
        return json_encode($result);
    }


    function __destruct()
    {
    }
}
