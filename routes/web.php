<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentRegisterController;
use App\Http\Controllers\RetailController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\KserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SaleApiController;
use App\Http\Controllers\ProductsApiController;
use App\Http\Controllers\GoogleSheetsController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\HumanresourceController;

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

Route::get('/pos', function () {
    return view('pos/pos');
});

Route::get('/add_sale', function () {
    return view('pos/add_sale');
});

Route::get('/googlesheet', [GoogleSheetsController::class, 'sheetOperation']);

Route::post('/product/importTemplate', [ProductController::class, 'import'])->name('products.import_Template');

Route::get('forget-password', [ForgotPasswordController::class,'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class,'submitForgetPasswordForm'])->name('forget.password.post');

Route::get('user-reset-password/{token}', [ForgotPasswordController::class,'showResetPasswordForm'])->name('resetpasswordget');
Route::post('user-reset-password', [ForgotPasswordController::class,'submitResetPasswordForm'])->name('reset.password.post');


Route ::group(['middleware' => ['auth']],function(){
    Route::get('/dashboard', [RetailController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [KserController::class, 'index'])->name('ksers.index');
    Route::get('/staffs/block/{id}', [StaffController::class, 'block']);
    Route::get('/staffs/unblock/{id}', [StaffController::class, 'unblock']);
    Route::get('/retail-report/store_locations', [RetailController::class, 'store_locations'])->name('retail-report.store_locations');
    Route::get('/retail-report/timeline', [RetailController::class, 'timeline'])->name('retail-report.timeline');
    Route::get('/retail-report/generate_excel/{report_key}/{store}', [RetailController::class, 'downloadExcelTemplate']);
    Route::get('/retail-report/generate_pdf/{report_key}/{store}', [RetailController::class, 'generate_pdf']);
    Route::get('/retail-report/send_pdf/{report_key}/{store}', [RetailController::class, 'send_pdf']);
    Route::get('/retail-report/download_pdf/{report_key}/{store}', [RetailController::class, 'download_pdf']);
    Route::get('/retail-report/store_sale/{store_sale}', [RetailController::class, 'store_sale'])->name('retail-report.store_sale');
    Route::get('/retail-report/staff_sale/{staff_sale}', [DistributionController::class, 'staff_sale'])->name('distribution.staff_sale');
    Route::get('/distribution/fetch_records', [DistributionController::class, 'fetch_records']);
    Route::get('/retail-report/fetch_records', [RetailController::class, 'fetch_records']);
    Route::get('/retail-report/fetch_records/{date_created}/{store}', [RetailController::class, 'fetch_records']);
    Route::get('/facility-report/generate_excel/{report_key}/{store}', [FacilityController::class, 'downloadExcelTemplate']);
    Route::get('/facility-report/send_pdf/{report_key}/{store}', [FacilityController::class, 'send_pdf']);
    Route::get('/facility-report/download_pdf/{report_key}/{store}', [FacilityController::class, 'download_pdf']);
    Route::get('/facility-report/generate_pdf/{report_key}/{store}', [FacilityController::class, 'generate_pdf']);
    Route::get('/facility-report/store_report/{store_report}', [FacilityController::class, 'store_report'])->name('facility-report.store_report');
    Route::get('/facility-report/fetch_records', [FacilityController::class, 'fetch_records']);
    Route::get('/retail-customers/export/', [CustomerController::class, 'downloadGroupTemplate'])->name('customer.template');
    Route::get('/retail-customers/enquiries', [CustomerController::class,'enquiries'])->name('customer.enquiries');
    Route::get('/retention/make_call', [VoiceController::class, 'makeCall'])->name('make_call');
    Route::post('/retention/initiate_call', [VoiceController::class, 'initiateCall'])->name('initiate_call');
    Route::get('/distribution/generate_excel/{report_key}/{store}', [DistributionController::class, 'downloadExcelTemplate']);
    Route::get('/distribution/generate_pdf/{report_key}/{store}', [DistributionController::class, 'generate_pdf']);
    Route::get('/distribution/send_pdf/{report_key}/{store}', [DistributionController::class, 'send_pdf']);
    Route::get('/distribution/download_pdf/{report_key}/{store}', [DistributionController::class, 'download_pdf']);
    Route::resource('/human-resource',HumanresourceController::class);
    Route::resource('/distribution',DistributionController::class);
    Route::resource('/staffs', StaffController::class);
    Route::resource('/retail-report', RetailController::class);
    Route::resource('/facility-report', FacilityController::class);
    Route::resource('/retail-customers', CustomerController::class);
    Route::resource('/student-biodata', StudentRegisterController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/sales',SalesController::class);
    Route::resource('api/saletemp',SaleApiController::class);
    Route::resource('api/prodtemp',ProductsApiController::class);
});





require __DIR__.'/auth.php';
