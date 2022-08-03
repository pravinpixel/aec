<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface EnquiryTemplateRepositoryInterface
{
    public function store($data);
    public function show($data);
    public function isTemplateExists($request);
    public function getTemplateByBuildingComponentId($id);
    public function destroy($id);
    public function update($id, $request);
}