<?php

namespace App\Repositories;

use App\Interfaces\DocumentTypeRepositoryInterface;
use App\Models\DocumentType;
use App\Models\Service;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DocumentTypeRepository implements DocumentTypeRepositoryInterface{
    protected $model;

    public function __construct(DocumentType $documentType)
    {
        $this->model = $documentType;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        $documentType = $this->model->find($id);
        $documentType->is_active=2;
        $documentType->save();
        return $documentType->delete();
    }

    public function find($id)
    {
        if (null == $documentType = $this->model->find($id)) {
            throw new ModelNotFoundException("Service not found");
        }
        return $documentType;
    }

    public function findByName($no)
    {
        return $this->model->where('document_type_name',$no)->first();
    }

    public function findBySlug($slug)
    {
        return $this->model->where('slug',$slug)->first();
    }
    public function updateStatus($id)
    {
        // return $this->model->find($id);
        // $module->is_active = !$module->is_active;
        if (null ==  $documentType = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $documentType->is_active =  !$documentType->is_active;
        $documentType->save();
        return  $documentType;
        
    }
    public function mandatory($id)
    {
       
        if (null ==  $documentType = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $documentType->is_mandatory =  !$documentType->is_mandatory;
        $documentType->save();
        return  $documentType;
        
    }
    public function getMandatoryField() 
    {
        return $this->model->where('is_mandatory',1)->get();
    }

    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }
}