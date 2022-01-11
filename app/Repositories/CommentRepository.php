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

    public function getCommentByEnquiryId($id) {
        return $this->model->where('enquiry_id', $id)->get();
    }

}