<?php

use App\Http\Controllers\AdminApplicationsController;
use App\Http\Controllers\FrontApplicationController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationsExportController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentsExportController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [WebsiteController::class, 'index'])->name('welcome');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');


Route::prefix('aksharam')->group(function(){
    Route::get('/features', [WebsiteController::class, 'exploreFeatures'])->name('aksharam.features');
    Route::get('/privacy-policy', [WebsiteController::class, 'privacy_policy'])->name('privacy_policy');
    Route::get('/terms-of-service', [WebsiteController::class, 'terms_of_service'])->name('terms_of_service');
    Route::get('/refund-policy', [WebsiteController::class, 'refund_policy'])->name('refund_policy');
    
    Route::get('/apply', [WebsiteController::class, 'apply'])->name('aksharam.apply');
    Route::post('/apply', [FrontApplicationController::class, 'apply'])->name('aksharam.apply.post');
    
    Route::get('/payment', [WebsiteController::class, 'payment'])->name('aksharam.payment');
    Route::get('/payment/manual', [WebsiteController::class, 'payment_manual'])->name('aksharam.payment.manual');
    Route::post('/payment/proccess', [FrontApplicationController::class, 'proccessPayment'])->name('aksharam.payment.proccess');
    
    Route::get('/payment/sucess', [WebsiteController::class, 'success'])->name('aksharam.payment.success');
    Route::get('/payment/{id}/invoice/', [FrontApplicationController::class, 'invoice'])->name('aksharam.payment.invoice');
    Route::get('/payment/failed', [WebsiteController::class, 'failed'])->name('aksharam.payment.failed');
    
    Route::get('/application/edit/requestcode', [FrontApplicationController::class, 'getVerification'])->name('aksharam.application.requestcode');
    Route::post('/application/edit/getcode', [FrontApplicationController::class, 'sendVerificationCode'])->name('aksharam.application.getcode');
    
    Route::get('/application/code/verify', [FrontApplicationController::class, 'getVerifyCode'])->name('aksharam.application.verify');
    Route::post('/application/code/verify', [FrontApplicationController::class, 'verifyCode'])->name('aksharam.application.verify.post');

    Route::get('/application/edit', [FrontApplicationController::class, 'edit'])->name('aksharam.application.edit');
    Route::patch('/application/{application}/edit', [FrontApplicationController::class, 'update'])->name('aksharam.application.update');

});



Route::prefix('admin')->group(function(){
    Auth::routes(['register' => false]);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout.get');

    Route::middleware('auth')->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('admin.indx');
    });

    Route::get('/applications', [AdminApplicationsController::class, 'index'])->name('admin.applications.index');
    Route::get('/applications/export/{type}', [ApplicationsExportController::class, 'export'])->name('admin.applications.export');
    Route::get('/applications/{application}', [AdminApplicationsController::class, 'edit'])->name('admin.applications.edit');
    Route::patch('/applications/{application}', [AdminApplicationsController::class, 'update'])->name('admin.applications.update');
    Route::get('/applications/{type}/list', [AdminApplicationsController::class, 'listApplications'])->name('admin.applications.list');

    Route::get('/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/payments/list', [PaymentController::class, 'listPayments'])->name('admin.payments.list');
    Route::get('/payments/export', [PaymentsExportController::class, 'export'])->name('admin.payments.export');
    
});


