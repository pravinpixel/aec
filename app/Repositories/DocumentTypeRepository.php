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
        return $this->model->destroy($id);
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
    public function getMandatoryField() 
    {
        return $this->model->where('is_mandatory',1)->get();
    }
}