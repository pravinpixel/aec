<?php

namespace App\Repositories;

use App\Interfaces\DocumentTypeEnquiryRepositoryInterface;
use App\Interfaces\EnquiryBuildingComponentDocumentInterface;
use App\Models\DocumentTypeEnquiry;
use App\Models\EnquiryBuildingComponentDocument;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DocumentTypeEnquiryRepository implements DocumentTypeEnquiryRepositoryInterface, EnquiryBuildingComponentDocumentInterface{
    protected $model;
    protected $enquiryBuildingComponent;

    public function __construct(
        DocumentTypeEnquiry $documentTypeEnquiry,
        EnquiryBuildingComponentDocument $enquiryBuildingComponent
    ){
        $this->model                    = $documentTypeEnquiry;
        $this->enquiryBuildingComponent = $enquiryBuildingComponent;
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

    public function getDocumentById($id)
    {
        if (null == $documentTypeEnquiry = $this->model->find($id)) {
            throw new ModelNotFoundException("Service not found");
        }
        return $documentTypeEnquiry;
    }

    public function geBuildingDocumentByEnquiryId($enquiry_id)
    {
        return $this->model->where('enquiry_id',$enquiry_id)->get();
    }
}