<?php

namespace App\Interfaces;
interface TechnicalEstimateRepositoryInterface
{
   public function assignUser($enquiry_id, $user_id);
}