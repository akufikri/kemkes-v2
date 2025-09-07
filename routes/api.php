<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\TypeDocumentController;

Route::middleware('web')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('dashboard')->group(function () {
    Route::apiResource('/type/document', TypeDocumentController::class);
    Route::apiResource('/biodata', BiodataController::class);
    Route::apiResource('/certificate', CertificateController::class);
});

Route::prefix('v1')->group(function(){
    Route::get('/get/certificate', [CertificateController::class, 'getCertificate']);
    Route::get('/download/certificate/{no_document}', [CertificateController::class, 'downloadPdf']);
    Route::prefix('playground')->group(function()   {
        Route::get('/', [PlaygroundController::class, 'index']);
    });
});