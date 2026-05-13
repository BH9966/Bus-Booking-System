<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperdminController;
use App\Http\Controllers\verify;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('booking_pages.layout');
})->name('home');

Route::get('/login',[verify::class ,'login'])->name('login');
Route::post('/logout', [verify::class, 'destroy'])->name('logout');


Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    Route::middleware('role:SuperAdmin')->prefix('admin')->group(function () {
        Route::get('/',[SuperdminController::class ,'index'])->name('dashboard_admin');
        Route::get('/company',[SuperdminController::class , 'showCompany'])->name('admin.comapny');
        Route::get('/company-information',[SuperdminController::class , 'companyInfons'])->name('admin.comapnyinfos');
        Route::get('/users', fn () => view('admin.user_create'))->name('admin.users');
    
    });

    Route::middleware('role:operator')->prefix('operator')->group(function () {
        Route::get('/', fn () => view('operator.dashboard'))->name('dashboard_operator');
    });

    Route::middleware('role:customer')->prefix('customer')->group(function () {
        Route::get('/', fn () => view('customer.dashboard'))->name('dashboard_customer');
    });

});