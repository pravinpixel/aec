<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AutoDeskRepositoryInterface
{
    public function createBucket(Request $request);
    public function deleteBucket(Request $request);
    public function uploadFile(Request $request);
    public function getModelFilelist(Request $request);
    public function viewModel($bucketname, $fname);
    public function checkBucketExists($bucketName);
    public function translateFile($bucketName, $file_name);
    public function getBuckets();
}