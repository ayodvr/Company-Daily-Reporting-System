<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentRegisterController;
use App\Http\Controllers\RetailController;
use App\Http\Controllers\FacilityController;

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
    return view('student.create');
});

Route::resource('/student-biodata', StudentRegisterController::class);
Route::resource('/retail-report', RetailController::class);
Route::resource('/facility-report', FacilityController::class);

Route::get('/dashboard', function () {
    return view('admin.admindash');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
