<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Service;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements UserRepositoryInterface{
    protected $model;
    protected $role;

    public function SetRole($name) : void {
        $role = Sentinel::findRoleBySlug($name);
        $this->role = $role;
    }

    public function all()
    {
       
    }

    public function create(array $data)
    {
         //Create a new user
         $user = Sentinel::registerAndActivate($data);
         //Attach the user to the role
         $role = $this->role;
         return $role->users()
                        ->attach($user);
    }

    public function update(array $data, $id)
    {
       
    }

    public function delete($id)
    {
       
    }

    public function find($id)
    {
        
    }
}