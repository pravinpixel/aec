<?php

namespace App\Repositories;

use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface{
    protected $model;

    function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    public function create(array  $data){
        return $this->model->create($data);
    }

    public function updateOrCreate(array  $data){
 
        return $this->model->updateOrCreate([
            'type' => $data['type'],
            'type_id' => $data['type_id'],
        ],['comments' => $data['comments'], 'created_by' => $data['created_by'] ]);
    }

    public function getCommentByEnquiryId($id) {
        return $this->model->where('type_id', $id)
                            ->with('customer')
                            ->first();
    }

    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }

}