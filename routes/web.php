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
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\ProviderReviewController;
use App\Http\Controllers\MissionMessageController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\UlixaiReviewController;

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
Route::get('/affiliate/sign-up', [AffiliateController::Class, 'affliateSignup']); 

Route::get('/', [ServiceProviderController::class, 'main']);
Route::get('/get-providers', [ServiceProviderController::class, 'getProviders']);
Route::get('/get-subcategories/{categoryId}', [ServiceProviderController::class, 'getSubcategories']);


// provider Profile
Route::get('/provider/{slug}', [ServiceProviderController::class, 'providerProfile']);

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
    Route::get('/get-subcategories/{categoryId}', [ServiceRequestController::class, 'getSubcategories']);
    Route::get('/get-missions', [ServiceRequestController::class, 'getMissions']);


    Route::get('/my-earnings', [EarningsController::class, 'index'])->name('user.earnings');
    Route::get('/conversations', [ConversationController::class, 'index'])->name('user.conversation');
    Route::get('/conversations/list', [ConversationController::class, 'list'])->name('conversations.list');
    Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversations.show');
    Route::post('/conversations/start', [ConversationController::class, 'start'])->name('conversations.start');
    Route::post('/conversations/{conversation}/message', [ConversationController::class, 'sendMessage'])->name('conversations.sendMessage');
    Route::get('/conversations/{conversation}/messages', [ConversationController::class, 'messages'])->name('conversations.messages');
    Route::get('/conversations/{conversation}/status', [ConversationController::class, 'status'])->name('conversations.status');
    
    Route::get('/payments', [PaymentController::class, 'index'])->name('user.payments');
    Route::get('/payments-validate', [PaymentController::class, 'paymentValidate'])->name('user.payments.validate');
    Route::get('/my-earning-payment', [PaymentController::class, 'earningAndPayments'])->name('my-earning-payment');
    Route::get('/reviews', [ReviewsController::class, 'reviews'])->name('user-reviews');
    Route::post('/review-ulysse', [ReviewsController::class, 'reviewUlysse'])->name('review-ulysse');
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
    Route::post('/provider/{id}/review', [ProviderReviewController::class, 'store'])->name('provider.review');
    Route::post('/mission/{id}/offer', [JobListController::class, 'submitOffer'])->name('mission.offer');

    Route::post('/mission/{id}/public-message', [MissionMessageController::class, 'store'])->name('mission.public-message');
    Route::get('/mission/{id}/public-messages', [MissionMessageController::class, 'list'])->name('mission.public-messages');

   

    Route::post('/payments/stripe/checkout', [StripePaymentController::class, 'checkout'])->name('payments.stripe.checkout');
    Route::post('/payments/stripe/process', [StripePaymentController::class, 'processPayment'])->name('payments.stripe.process');
    Route::get('/payments/success/{mission}', [StripePaymentController::class, 'success'])->name('payments.success');
    Route::get('/payments/cancel', [StripePaymentController::class, 'cancel'])->name('payments.stripe.cancel');
    Route::post('/broadcasting/auth', function (Request $request) {
        return Broadcast::auth($request);
    });


    // Ulixai Reviews By Users

    Route::post('ulixai/review', [UlixaiReviewController::class, 'userReview'])->name('submit-ulixai-review');

});


// Request Routes
Route::get('/create-request', [ServiceRequestController::class, 'createRequest']);
Route::post('/save-request', [ServiceRequestController::class, 'saveRequestForm'])->name('save-request-form');


// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/transactions', [AdminDashboardController::class, 'transactions'])->name('transactions');
        Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
        Route::post('/secret-login/{id}', [AdminDashboardController::class, 'secretLogin'])->name('secret-login');
        Route::post('/restore-admin', [AdminDashboardController::class, 'restoreAdmin'])->name('restore-admin');
        Route::post('/commission/update', [AdminDashboardController::class, 'updateCommission'])->name('commission.update');
        Route::post('/stripe/kyc/remind/{provider}', [AdminDashboardController::class, 'remindKyc'])->name('stripe.kyc.remind');

        // Transaction management
        Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
        Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
    });
});

//Profile sharing routes 
Route::get('/provider/{slug}', [ServiceProviderController::class, 'providerProfile'])->name('provider.profile');


Route::get('/{slug?}', [PageController::class, 'show'])->where('slug', '.*');
