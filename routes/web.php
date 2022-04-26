<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentRegisterController;

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
    return view('auth.login');
});

Route::resource('/student-biodata', StudentRegisterController::class);

Route::get('/dashboard', function () {
    return view('admin.admindash');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
