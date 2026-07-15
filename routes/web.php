<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SuperdminController;
use App\Http\Controllers\verify;
use App\Http\Controllers\PassengerDetailsController;
use App\Http\Controllers\Dashboard\SearchBus;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('booking_pages.layout');
})->name('home');

Route::get('/login',[verify::class ,'login'])->name('login');
Route::post('/logout', [verify::class, 'destroy'])->name('logout');
Route::get('/bus-results/{from}/{to}/{date}',[SearchBus::class, 'index'])->name('search_bus');
Route::get('/pickup/dropout',[BookingController::class, 'passengerview'])->name('passenger_view');
Route::get('/passenger-details', [PassengerDetailsController::class, 'index'])->name('passenger.details');
Route::post( '/booking/release-reservation', [ BookingController::class, 'releaseSeatReservation' ])->name('booking.releaseReservation');


Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    Route::middleware('role:SuperAdmin')->prefix('SuperAdmin')->group(function () {
        Route::get('/',[SuperdminController::class ,'index'])->name('dashboard_superadmin');
        Route::get('/company',[SuperdminController::class , 'showCompany'])->name('superadmin.comapny');
        Route::get('/company-information',[SuperdminController::class , 'companyInfons'])->name('superadmin.comapnyinfos');
        Route::get('/users',[SuperdminController::class , 'userpage'])->name('superadmin.users');
        Route::post('/adduser',[SuperdminController::class, 'store'])->name('users.store');
        Route::delete('/user/{id}',[SuperdminController::class , 'deleteUser'])->name('userdelete');
        Route::post('/addd-company',[SuperdminController::class, 'addCompany'])->name('add_company');
        Route::delete('/company/{id}',[SuperdminController::class , 'deleteCompany'])->name('deleteCompany');

    });

    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/',[AdminController::class , 'index'] )->name('dashboard_admin');
        Route::get('/buses',[AdminController::class , 'showBuses'])->name('admin_buses');
        Route::post('/buses/add',[AdminController::class , 'addBus'])->name('adminAddbus');
        Route::delete('/bus/{id}',[AdminController::class, 'deleteBus'])->name('busdelete');
        Route::get('/bus/viewseat',[AdminController::class , 'viewseat'])->name('admin_view_seat');
        Route::post('seat',[AdminController::class, 'addSeat'])->name('addseat');
        Route::delete('seat/{id}',[AdminController::class , 'deleteseat'])->name('deleteseat');
        Route::get('/location',[AdminController::class , 'viewlocation'])->name('viewlocation');
        Route::get('/region',[AdminController::class , 'viewregion'])->name('region');
        Route::post('/addregion',[AdminController::class ,'storeRegion'])->name('storeregion');
        Route::delete('/deleteregion/{id}',[AdminController::class , 'deleteregion'])->name('regiondelete');
        Route::post('/addlocation',[AdminController::class ,'storeLocation'])->name('storelocation');
        Route::delete('/deletelocation/{id}',[AdminController::class , 'deletelocation'])->name('locationdelete');
        Route::get('/roots',[AdminController::class , 'viewroots'])->name('viewroute');
        Route::post('/addroots',[AdminController::class, 'storeRoute'])->name('storeRoute');
        Route::delete('/root/{id}',[AdminController::class , 'deleteroot'])->name('routedelete');
        Route::get('/trip',[AdminController::class , 'viewtrip'])->name('trip');
        Route::post('addTrip',[AdminController::class ,'storeTrip'])->name('addtrip');
    });

    Route::middleware('role:customer')->prefix('customer')->group(function () {
        Route::get('/', fn () => view('customer.dashboard'))->name('dashboard_customer');
    });

});
