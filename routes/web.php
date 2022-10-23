<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentRegisterController;
use App\Http\Controllers\RetailController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\KserController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});


Route ::group(['middleware' => ['auth']],function(){
    Route::get('/dashboard', [RetailController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [KserController::class, 'index'])->name('ksers.index');
    Route::get('/retail-report/store_locations', [RetailController::class, 'store_locations'])->name('retail-report.store_locations');
    Route::get('/retail-report/timeline', [RetailController::class, 'timeline'])->name('retail-report.timeline');
    Route::get('/retail-report/generate_pdf/{report_key}/{store}', [RetailController::class, 'generate_pdf']);
    Route::get('/retail-report/send_pdf/{report_key}/{store}', [RetailController::class, 'send_pdf']);
    Route::get('/retail-report/store_sale/{store_sale}', [RetailController::class, 'store_sale'])->name('retail-report.store_sale');
    Route::get('/retail-report/fetch_records/{date_created}/{store}', [RetailController::class, 'fetch_records']);
    Route::get('/facility-report/generate_pdf/{report_key}/{store}', [FacilityController::class, 'generate_pdf']);
    Route::get('/facility-report/store_report/{store_report}', [FacilityController::class, 'store_report'])->name('facility-report.store_report');
    Route::get('/facility-report/fetch_records/{date_created}/{store}', [FacilityController::class, 'fetch_records']);
    Route::get('/retail-customers/export/', [CustomerController::class, 'downloadGroupTemplate'])->name('customer.template');
    Route::resource('/retail-report', RetailController::class);
    Route::resource('/facility-report', FacilityController::class);
    Route::resource('/retail-customers', CustomerController::class);
    Route::resource('/student-biodata', StudentRegisterController::class);
});





require __DIR__.'/auth.php';
