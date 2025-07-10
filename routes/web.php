<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\JobListController;
use App\Http\Controllers\EarningsController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ReviewsController;

// AJAX user signup
Route::post('/signup/store', [UserController::class, 'storeViaSignup']);

// User Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('user.login');

// Forgot Password
Route::get('/forgot-password', function() {
    return view('user-auth.forgot-password');
});
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

Route::get('/signup', function() {
    return view('user-auth.signup');
});

// User Registeration
Route::post('/register', [RegisterController::class, 'register'])->name('user.register');
Route::post('/verify-email-otp', [RegisterController::class, 'verifyEmailOtp'])->name('user.verifyEmailOtp');
Route::post('/signup/register', [RegisterController::class, 'signupRegister'])->name('user.signupRegister');
Route::post('/resend-email-otp', [RegisterController::class, 'resendEmailOtp'])->name('user.resendEmailOtp');




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/service-request', [ServiceRequestController::class, 'index'])->name('user.service.requests');
    Route::get('/view-service-request', [ServiceRequestController::class, 'viewServiceRequest'])->name('view.request');
    Route::get('/ongoing-requests', [ServiceRequestController::class, 'ongoingServiceRequest'])->name('ongoing-requests');


    Route::get('/my-earnings', [EarningsController::class, 'index'])->name('user.earnings');
    Route::get('/conversations', [ConversationController::class, 'index'])->name('user.conversation');
    
    Route::get('/payments', [PaymentController::class, 'index'])->name('user.payments');
    Route::get('/my-earning-payment', [PaymentController::class, 'earningAndPayments'])->name('my-earning-payment');
    Route::get('/reviews', [ReviewsController::class, 'reviews'])->name('user-reviews');
    Route::get('/review-ulysse', [ReviewsController::class, 'reviewUlysse'])->name('review-ulysse');
    Route::get('/review-options', [ReviewsController::class, 'reviewOptions'])->name('review-options');
    Route::get('/review-end', [ReviewsController::class, 'reviewEnd'])->name('review-end');
    
    
    // Service Provider
    Route::get('/service-providers', [ServiceProviderController::class, 'serviceProviders'])->name('service-providers');
    Route::get('/provider-details/{id}', [ServiceProviderController::class, 'providerDetails'])->name('provider-details');
    


    //Job Routes
    Route::get('/job-list', [JobListController::class, 'index'])->name('user.joblist');
    Route::get('/view-job', [JobListController::class, 'viewJob'])->name('view-job');
    Route::get('/quote-offer', [JobListController::class, 'quoteOffer'])->name('qoute-offer');

    //Account Routes
    Route::get('/account', [AccountController::class, 'index'])->name('user.account');
    Route::get('/personal-info', [AccountController::class, 'personalInfo'])->name('personal-info');
    Route::get('/affiliations', [AccountController::class, 'affiliationAccounts'])->name('user.affiliate.account');
    Route::get('/my-documents', [AccountController::class, 'myDocuments'])->name('my-documents');
    Route::get('/point-calculation', [AccountController::class, 'pointCalculation'])->name('points-calculation');
    Route::get('/upload-picture', [AccountController::class, 'uploadPicture'])->name('upload-picture');
    Route::get('/upload-document', [AccountController::class, 'uploadDocument'])->name('upload-document');
    Route::post('/profile/photo', [AccountController::class, 'uploadProfilePicture'])->name('profile.photo.upload');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// Request Routes
Route::get('/create-request', [ServiceRequestController::class, 'createRequest']);
Route::post('/save-request', [ServiceRequestController::class, 'saveRequestForm'])->name('save-request-form');
Route::get('/{slug?}', [PageController::class, 'show'])->where('slug', '.*');

