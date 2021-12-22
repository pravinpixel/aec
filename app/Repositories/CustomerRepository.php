<?php

namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface{
    protected $model;

    function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

    public function all(){

    }

    public function create(array  $data){
        return $this->model::create($data);
    }

    public function setRole(string $name){

    }

    public function update(array $data, $id){

    }
    
    public function delete($id){

    }

    public function find($id){

    }
}