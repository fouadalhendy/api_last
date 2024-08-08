<?php

use App\Http\Controllers\AuthControler;
use App\Http\Controllers\CategoreController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContacteController;
use App\Http\Controllers\EducationeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('login', [AuthControler::class,'login']);
Route::post('regster', [AuthControler::class,'regster']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthControler::class,'logout']);

    Route::get('categore',[CategoreController::class,'index']);
    Route::post('categore',[CategoreController::class,'store']);
    Route::get('categore/{categore}',[CategoreController::class,'show']);
    Route::put('categore/{categore}',[CategoreController::class,'update']);
    Route::delete('categore/{categore}',[CategoreController::class,'destroy']);


    Route::get('certificate',[CertificateController::class,'index']);
    Route::post('certificate',[CertificateController::class,'store']);
    Route::get('certificate/{certificate}',[certificateController::class,'show']);
    Route::put('certificate/{certificate}',[certificateController::class,'update']);
    Route::delete('certificate/{certificate}',[certificateController::class,'destroy']);



    Route::get('contacte',[ContacteController::class,'index']);
    Route::post('contacte',[ContacteController::class,'store']);
    Route::get('contacte/{contacte}',[ContacteController::class,'show']);
    Route::put('contacte/{contacte}',[ContacteController::class,'update']);
    Route::delete('contacte/{contacte}',[ContacteController::class,'destroy']);

    Route::get('educatione',[EducationeController::class,'index']);
    Route::post('educatione',[EducationeController::class,'store']);
    Route::get('educatione/{educatione}',[EducationeController::class,'show']);
    Route::put('educatione/{educatione}',[EducationeController::class,'update']);
    Route::delete('educatione/{educatione}',[EducationeController::class,'destroy']);

    Route::get('project',[ProjectController::class,'index']);
    Route::post('project',[ProjectController::class,'store']);
    Route::get('project/{project}',[ProjectController::class,'show']);
    Route::put('project/{project}',[ProjectController::class,'update']);
    Route::delete('project/{project}',[ProjectController::class,'destroy']);
});
