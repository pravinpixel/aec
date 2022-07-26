<?php

use App\Http\Controllers\Sharepoint\SharepointController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Office365\SharePoint\ClientContext;
use Office365\Runtime\Auth\ClientCredential;
use Office365\SharePoint\ListItem;
Route::get('credentials', [SharepointController::class,'create']); 
Route::get('credentials', [SharepointController::class,'delete']); 