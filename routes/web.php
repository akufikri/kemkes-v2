<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\TypeDocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome/check_document', function() {
    return view('general.welcome');
});
Route::get('/icv', function() {
    return view('general.icv');
});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

Route::prefix('dashboard')->group(function() {
    Route::get('/', function(){ return view('admin.dashboard'); });
    Route::get('/biodata', [BiodataController::class, 'getView']);
    Route::get('/type/document', [TypeDocumentController::class, 'getView']);
    Route::get('/certificate', [CertificateController::class, 'getView']);
});