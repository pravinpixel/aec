<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

interface ProjectTicketRepositoryInterface

{
    public function all();
    public function create(array  $data);
   
  
    public function update(array $data, $id);
    public function delete($id);
    public function ticketdelete($id);
    public function find($id);
    public function getprojectticket($id);
    public function findprojectticket($id);
    public function findvariationticket($id);
    public function findprojectteam($project);
    public function getprojectticketsearch($id ,$type);
    public function getprojectticketfiltersearch(array $data);
    
    
}