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
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\MissionAdminController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\ExpatsLeaderboardController;
use App\Http\Controllers\Admin\RolesAndPermissionsController;
use App\Http\Controllers\Admin\FakeContentController;
use App\Http\Controllers\ProviderReviewController;
use App\Http\Controllers\MissionMessageController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\UlixaiReviewController;
use App\Http\Middleware\AdminAuthenticate;

// AJAX user signup
Route::post('/signup/store', [UserController::class, 'storeViaSignup']);

// User Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('user.login');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

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

Route::get('/become-service-provider',  function() {
    return view('pages.service-provider');
})->name('become.service.provider');

// provider Profile
Route::get('/provider/{slug}', [ServiceProviderController::class, 'providerProfile']);

// User Registeration
Route::post('/register', [RegisterController::class, 'register'])->name('user.register');
Route::post('/verify-email-otp', [RegisterController::class, 'verifyEmailOtp'])->name('user.verifyEmailOtp');
Route::post('/signup/register', [RegisterController::class, 'signupRegister'])->name('user.signupRegister');
Route::post('/resend-email-otp', [RegisterController::class, 'resendEmailOtp'])->name('user.resendEmailOtp');

//Legal Information
Route::get('/legal-notice', function() {
    return view('pages.legal-notice');
});


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
    Route::get('/attachments/{attachment}/download', [ConversationController::class, 'downloadAttachment'])->name('attachments.download');
    
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
    Route::post('/update-provider-profile', [AccountController::class, 'uploadProviderProfile'])->name('provider.profile.photo.ajax');
    Route::post('/provider/upload-document', [AccountController::class, 'uploadDocuments'])->name('provider.upload.document');


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


    //Stripe 
    Route::get('/provider/stripe/onboarding-link', [StripePaymentController::class, 'getOnboardingLink'])->name('stripe.kyc.link');

    Route::get('/stripe/refresh', fn() => redirect()->back())->name('stripe.refresh');
    Route::get('/stripe/return', fn() => redirect('/dashboard'))->name('stripe.return');


    // Withdraw Funds

    Route::post('/user/funds', [EarningsController::class, 'manageUserFunds'])->name('affiliate.withdraw');

    //Personal Inforation

    Route::prefix('account')->group(function () {
        Route::get('/profile', [AccountController::class, 'getProfile']);
        Route::post('/update-personal-info', [AccountController::class, 'updatePersonalInfo']);
        Route::post('/update-field', [AccountController::class, 'updateField']);
        Route::post('/update-password', [AccountController::class, 'updatePassword']);
        Route::post('/provider/special-status/save', [AccountController::class, 'saveSpecialStatus']);

    });
});


// Request Routes
Route::get('/create-request', [ServiceRequestController::class, 'createRequest']);
Route::post('/save-request', [ServiceRequestController::class, 'saveRequestForm'])->name('save-request-form');


// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['web'])->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth:admin', AdminAuthenticate::class])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/transactions', [AdminDashboardController::class, 'transactions'])->name('transactions');
        Route::match(['get', 'post', 'patch', 'delete'], '/badges', [AdminDashboardController::class, 'badges'])->name('badges');
        Route::match(['get', 'post', 'patch', 'delete'], '/point-leaderboard', [ExpatsLeaderboardController::class, 'index'])->name('reputation-points');
        Route::post('/provider/{provider}/adjust-points', [ExpatsLeaderboardController::class, 'adjustPoints'])->name('provider.adjust-points');
        
        Route::get('/reputation-points', [ExpatsLeaderboardController::class, 'showConfig'])->name('reputation.config');
        Route::post('/adjust-reputation-points', [ExpatsLeaderboardController::class, 'adjustReputationPoints'])->name('adjust-reputation-points');

        Route::match(['get', 'post', 'patch', 'delete'], '/settings', [AdminSettingsController::class, 'settings'])->name('settings');
        Route::get('/users', [UserManagementController::class, 'users'])->name('users');
        Route::match(['get', 'patch'], '/users/{user}/manage', [UserManagementController::class, 'manage'])->name('users.manage');
        Route::patch('/missions/{mission}/manage', [UserManagementController::class, 'manageMission'])->name('missions.manage');
        Route::post('/secret-login/{id}', [AdminDashboardController::class, 'secretLogin'])->name('secret-login');
        Route::post('/restore-admin', [AdminDashboardController::class, 'restoreAdmin'])->name('restore-admin');
        Route::post('/commission/update', [AdminDashboardController::class, 'updateCommission'])->name('commission.update');
        Route::post('/stripe/kyc/remind/{provider}', [AdminDashboardController::class, 'remindKyc'])->name('stripe.kyc.remind');

        // Transaction management
        Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
        Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
        Route::get('/users/{id}/edit-profile', [UserManagementController::class, 'editProfileView'])->name('users.edit-profile');
        Route::post('/users/{id}/update-profile', [UserManagementController::class, 'editUserProfile'])->name('users.update-profile');
        
        Route::get('/missions', [MissionAdminController::class, 'index'])->name('missions');
        Route::get('/missions/{id}', [MissionAdminController::class, 'show'])->name('missions.show');
        Route::get('/missions', [MissionAdminController::class, 'index'])->name('missions');
        Route::get('/admin/missions/{id}', [MissionAdminController::class, 'show'])->name('missions.show');
        Route::get('/missions/{id}/edit', [MissionAdminController::class, 'edit'])->name('missions.edit');
        Route::get('/missions/{id}/conversation', [MissionAdminController::class, 'conversation'])->name('missions.conversation');
        Route::post('/missions/{id}/edit', [MissionAdminController::class, 'update'])->name('missions.update');
        // Route::post('/users/{user}/block', [UserManagementController::class, 'suspendUser'])->name('users.block');

        // In your routes/web.php or api.php
        Route::post('/users/{user}/block', [UserManagementController::class, 'suspendUser'])->name('users.block');
        Route::post('/users/{user}/unblock', [UserManagementController::class, 'unblockUser'])->name('users.unblock');
        Route::get('/roles-permissions', [RolesAndPermissionsController::class, 'index'])->name('roles-permissions');
        Route::post('/roles-permissions/{id}/assign', [RolesAndPermissionsController::class, 'assignRole'])->name('roles-permissions.assign');
        Route::post('/roles-permissions/{id}/revoke', [RolesAndPermissionsController::class, 'revokeRole'])->name('roles-permissions.revoke');
        Route::post('/roles-permissions/create', [RolesAndPermissionsController::class, 'createAdmin'])->name('roles-permissions.create');

        // Admin World Map View
        Route::get('/world-map', [UserManagementController::class, 'adminWorldMap'])->name('w-map-view');

        // Admin Fake Content Generation
        Route::get('/fake-content-generation', [FakeContentController::class, 'index'])->name('fake-content-generation');
        Route::get('/fake-content-generation/create-requester', [FakeContentController::class, 'createRequesterForm'])->name('fake-content.create-requester-form');
        Route::get('/fake-content-generation/create-provider', [FakeContentController::class, 'createProviderForm'])->name('fake-content.create-provider-form');
        Route::get('/fake-content-generation/create-mission', [FakeContentController::class, 'createMissionForm'])->name('fake-content.create-mission-form');
        Route::post('/fake-content-generation/create', [FakeContentController::class, 'createFake'])->name('fake-content.create');
        Route::post('/fake-content-generation/{type}/{id}/update', [FakeContentController::class, 'updateFake'])->name('fake-content.update');
        Route::post('/fake-content-generation/{type}/{id}/delete', [FakeContentController::class, 'deleteFake'])->name('fake-content.delete');
    });
});

//Profile sharing routes 
Route::get('/provider/{slug}', [ServiceProviderController::class, 'providerProfile'])->name('provider.profile');


Route::get('/{slug?}', [PageController::class, 'show'])->where('slug', '.*');
Route::post('/conversations/{conversation}/report', [ConversationController::class, 'report'])->middleware('auth');