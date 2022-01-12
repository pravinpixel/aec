<?php

namespace App\Interfaces;
interface DocumentTypeEnquiryRepositoryInterface
{
    public function getDocumentByEnquiryId($id);
}