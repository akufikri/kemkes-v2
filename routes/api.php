<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\TypeDocumentController;

Route::middleware('web')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

Route::prefix('dashboard')->group(function () {
    Route::apiResource('/type/document', TypeDocumentController::class);
    Route::apiResource('/biodata', BiodataController::class);
    Route::apiResource('/certificate', CertificateController::class);
});