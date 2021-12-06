<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('menu',[MenuController::class, 'index'])->name('menu.index');
Route::post('menu',[MenuController::class, 'store'])->name('menu.store');
Route::get('menu/{id}',[MenuController::class, 'edit'])->name('menu.edit');
Route::put('menu/{id}',[MenuController::class, 'update'])->name('menu.update');
Route::delete('menu/{id}',[MenuController::class, 'destroy'])->name('menu.destroy');

?>