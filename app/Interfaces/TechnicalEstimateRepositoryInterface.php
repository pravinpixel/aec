<?php

namespace App\Interfaces;
interface TechnicalEstimateRepositoryInterface
{
   public function assignUser($enquiry_id, $user_id, $assign_for = null);
   public function removeUser($enquiry_id);
}