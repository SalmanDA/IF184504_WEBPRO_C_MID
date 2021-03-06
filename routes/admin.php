<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminEmployeeController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminProfileController;

// Admin
Route::group(['middleware' => ["UserAdmin", 'prevent-back'], 'as' => 'adm.'], function() {
    Route::get('/employee', [AdminEmployeeController::class, 'index'])->name('employee');
    Route::get('/employee/destroy/{id}',[AdminEmployeeController::class,'destroy'])->name('destroyemployee');
    Route::get('/adminreport', [AdminReportController::class, 'index'])->name('adminreport');
    Route::get('/adminprofile', [AdminProfileController::class, 'index'])->name('adminprofile');
    Route::post('adminprofile',[AdminProfileController::class,'updateadminprofile'])->name('updateadminprofile');
});