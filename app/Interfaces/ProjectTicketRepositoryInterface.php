<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
interface ProjectTicketRepositoryInterface

{
    public function all();
    public function create(array  $data);
   
  
    public function update(array $data, $id);
    public function delete($id);
    public function find($id);
    public function getprojectticket($id);
    public function findprojectticket($id);
    
}