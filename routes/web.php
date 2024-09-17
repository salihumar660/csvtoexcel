<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\authenticationController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\UploadFileController;
use App\Http\Middleware\CheckAuthenticated;

Route::get('/', function () {
    return view('welcome');
});
//login routes
Route::get('/', [authenticationController::class, 'index'])->name('login-form');
Route::post('login', [authenticationController::class, 'login'])->name('login');
//register route
Route::get('/register/form', [authenticationController::class, 'regForm'])->name('register-form');
Route::post('/register', [authenticationController::class, 'register'])->name('reigster');
//logout route
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login-form');
})->name('logout');

Route::middleware(CheckAuthenticated::class)->group(function () {
    //dashboard route
    Route::get('/dashboard', [authenticationController::class, 'dashboard'])->name('dashboard');
    //CSV routes
    Route::get('/upload/file/form', [UploadFileController::class, 'showForm'])->name('upload-form');
    Route::post('/import/csv', [UploadFileController::class, 'import'])->name('import-csv');
    Route::get('/export/csv', [UploadFileController::class, 'export'])->name('export-csv');
    //with address route
    Route::get('/user/address', [UserDetailController::class, 'withAddress'])->name('users-adresses');
    //without address route
    Route::get('/user/without/address', [UserDetailController::class, 'withOutAddress'])->name('users-without-Address');
    //duplicate addresses
    Route::get('/duplicate/address', [UserDetailController::class, 'duplicateAddress'])->name('duplicate-Address');
});
