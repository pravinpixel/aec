<?php

namespace App\Repositories;

use App\Interfaces\DocumentTypeEnquiryRepositoryInterface;
use App\Models\DocumentTypeEnquiry;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DocumentTypeEnquiryRepository implements DocumentTypeEnquiryRepositoryInterface{
    protected $model;

    public function __construct(DocumentTypeEnquiry $documentTypeEnquiry)
    {
        $this->model = $documentTypeEnquiry;
    }

    public function getDocumentByEnquiryId($enquiryId) 
    {
        return $this->model->with('documentType')
                            ->where('enquiry_id', $enquiryId)
                            ->whereNull('deleted_at')
                            ->get();
    }

    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }
}