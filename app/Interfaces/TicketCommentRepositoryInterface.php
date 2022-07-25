<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
interface TicketCommentRepositoryInterface
{
    public function all();
    public function create(array  $data);
  
    public function update(array $data, $id);
    public function delete($id);
    public function find($id);
    
    
    public function findprojectticketcomment($id,$type);
   public function store(Request $request, $created_by, $role_by,$seen_by);

    
}