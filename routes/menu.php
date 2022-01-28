<?php

    use App\Http\Controllers\Admin\MenuController;
    use App\Http\Controllers\Admin\Master\ModuleController;
    use App\Http\Controllers\Admin\ModuleMenuController;
    use Illuminate\Support\Facades\Route;
        
    Route::get('menu/get-drop-down', [MenuController::class,'getDropDownModule'] )->name('module.get-drop-down');
    Route::put('menu/status/{id}', [MenuController::class,'status'] )->name('module.status');
    Route::resource('menu', MenuController::class);

    Route::get('module/get-drop-down', [ModuleController::class,'getDropDownModule'] )->name('module.get-drop-down');
    

    Route::resource('module-menu', ModuleMenuController::class);
   
?>