<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\PayPalPaymentController;



// use App\Http\Controllers\ResetPasswordController;
// use App\Http\Controllers\Auth\ResetPasswordController;
// use App\User;
use App\Http\Controllers\Auth\User;




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
    return view('theme.index');
});

Auth::routes();

// Route::get('/', [HomeController::class, 'login'])->name('login');
Route::middleware('auth')->group(function(){
    Route::get('type', [CertificateController::class,'type'])->name('type');
    Route::get('birth', [CertificateController::class,'birth'])->name('birth');
    Route::get('marriage', [CertificateController::class,'marriage'])->name('marriage');
    Route::get('death', [CertificateController::class,'death'])->name('death');
    Route::get('divorce', [CertificateController::class,'divorce'])->name('divorce');
    Route::post('submit-form', [CertificateController::class,'submit_form'])->name('submit-form');
    Route::get('detail', [CertificateController::class,'detail'])->name('detail');
    Route::get('delete_form/{id}', [CertificateController::class,'delete_form'])->name('delete_form');

    Route::get('account', [CertificateController::class,'account'])->name('account');
    Route::get('edit_user', [UserController::class,'edit_user'])->name('edit_user');
    Route::post('forgot_password', [UserController::class,'forgot_password'])->name('forgot_password');
    Route::post('update_cart', [CertificateController::class,'update_cart'])->name('update_cart');




    Route::get('checkout', [UserOrderController::class,'checkout'])->name('checkout');
    Route::post('paypal', [PayPalPaymentController::class,'postPaymentWithpaypal'])->name('paypal');
    Route::get('paypal_status', [PayPalPaymentController::class,'getPaymentStatus'])->name('getPaymentStatus');

});

Route::post('certificate-register', [HomeController::class,'certificate_register'])->name('certificate-register');
// Route::get('login', [HomeController::class,'login'])->name('login');




