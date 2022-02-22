<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface EnquiryCommentRepositoryInterface
{
    public function store(Request $request);
    public function show(Request $request, $id, $type);
    public function showTechChat(Request $request, $id, $type);
    public function getCommentsCountByType($id);
    public function getActiveCommentsCountByType($id);
}