<?php

namespace App\Interfaces;
interface CostEstimateRepositoryInterface
{
   public function assignUser($enquiry_id, $user_id);
}