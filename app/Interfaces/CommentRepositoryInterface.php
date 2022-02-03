<?php

namespace App\Interfaces;

use App\Models\Enquiry;
use App\Models\Customer;
use App\Models\Service;

interface CommentRepositoryInterface
{
    public function create(array  $data);
    public function updateOrCreate(array $data);
    public function getCommentByEnquiryId($id);
}