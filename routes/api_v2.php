<?php


use Illuminate\Support\Facades\Route;

Route::get('categories',[\App\Http\Controllers\Api\CategoryController::class,'index_v2']);
