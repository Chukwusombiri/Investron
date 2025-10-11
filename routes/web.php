<?php

use App\Http\Controllers\Admin\AdminDashBoardController;
use App\Http\Controllers\Admin\CompanyWalletController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\WithdrawalController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\General\GeneralPagesController;
use App\Http\Controllers\General\InquiryController;
use App\Http\Controllers\General\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\User\UserContactController;
use App\Http\Controllers\VerificationCodeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/* ADMINISTRATORS */
Route::prefix('admin')
    ->group(function () {
        Route::controller(LoginController::class)->group(
            function () {
                Route::get('/login', 'login')->middleware(['guest'])->name('admin.login');                

                Route::post('/authenticate', 'authenticate')
                    ->middleware(array_filter([
                        'guest',                        
                    ]))->name('admin.login.authenticate');

                Route::post('/admin_logout', 'logout')->name('admin.logout');
                Route::get('/admin-forgot-password', 'forgotPassword')->middleware(['guest'])->name('admin.password.forgot');
                Route::post('/admin-forgot-password', 'sendResetPassword')->middleware(['guest'])->name('admin.password.send.email');
                Route::get('/admin-reset-password/{token}', 'resetPassword')->middleware(['guest'])->name('admin.password.reset');
                Route::post('/admin-reset-password', 'resetComplete')->middleware(['guest'])->name('admin.password.reset.complete');
            }
        );
        Route::redirect('/', '/admin/dashboard');
        Route::middleware(['auth.admin', 'auth.session.admin',])->as('admin.')->group(function () {
            /* notifications */
            Route::controller(AdminDashBoardController::class)->group(function () {
                Route::get('/dashboard', 'index')->name('dashboard');
                Route::get('/resetpwd', 'resetpwd')->name('resetpwd');
                Route::get('/administrators', 'administrators')->name('administrators');
                Route::get('/administrators/new', 'newAdministrator')->name('administrator.new');
                Route::get('/administrators/edit/{id}', 'editAdministrator')->name('administrator.edit');
                Route::get('/account/profile', 'profile')->name('admin_profile');
                Route::get('/account/security', 'passwordChange')->name('admin.password.change');
                Route::get('/user/deposit/edit/{id}', 'editUserDeposit')->name('edit.userInvestment');
                Route::get('/referral-and-rewards/referral-system', 'referralSystem')->name('referrals.show');
            });
            Route::get('/getUserWallets/{id}', [WithdrawalController::class, 'getUserWallets'])->name('getUserWallets');

            /* user management */
            Route::resource('users', UsersController::class)->names([
                'index' => 'users',
                'show' => 'user.show',
                'edit' => 'user.edit',
            ]);

            Route::get('/user/account/{id}',[UsersController::class, 'account'])->name('user.account');

            /* company wallets */
            Route::get('/company_wallets', [CompanyWalletController::class, 'index'])->name('company_wallets');
            Route::get('/company_wallet/create/{id?}', [CompanyWalletController::class, 'create'])->name('company_wallet.create');
            Route::post('/company_wallet/store', [CompanyWalletController::class, 'store'])->name('company_wallet.store');
            Route::get('/company_wallet/edit/{id}', [CompanyWalletController::class, 'edit'])->name('company_wallet.edit');
            Route::patch('/company_wallet/update/{id}', [CompanyWalletController::class, 'update'])->name('company_wallet.update');
            Route::delete('/company_wallet/delete/{id}', [CompanyWalletController::class, 'destroy'])->name('company_wallet.destroy');

            /* plans */
            Route::get('/plans', [PlanController::class, 'index'])->name('plans');
            Route::get('/plan/create/{id?}', [PlanController::class, 'create'])->name('plan.create');
            Route::get('/plan/edit/{id}', [PlanController::class, 'edit'])->name('plan.edit');
            Route::delete('/plan/destroy/{id}', [PlanController::class, 'destroy'])->name('plan.destroy');

            /* investment deposits */
            Route::resource('/deposits', DepositController::class)->names([
                'index' => 'deposits',
                'create' => 'deposit.create',
            ]);

            /* withdrawal */
            Route::resource('/withdrawals', WithdrawalController::class)->names([
                'index' => 'withdrawals',
                'create' => 'withdrawal.create',
            ]);

            /* mail */
            Route::get('/getmail/{email?}', [MailController::class, 'getmail'])->name('getmail');

            Route::resource('/articles',ArticleController::class);
            Route::get('/topics',[TopicController::class,'index'])->name('topics');                        
        });
});

Route::controller(GeneralPagesController::class)->group(function(){
    Route::get('/', 'index')->name('guest_home');
    Route::get('/about-us','about')->name('about');
    Route::get('/who-we-serve', 'services')->name('services');
    Route::get('/find-an-advisor', 'advisors')->name('advisors');
    Route::get('/client-relationship', 'clientRelationship')->name('client_relationship');
    Route::get('/accessibility', 'accessibility')->name('accessibility');
    Route::get('/privacy-policy', 'privacy')->name('privacy_policy');
    Route::get('/terms-of-use', 'terms')->name('terms');
    Route::get('/disclosure', 'disclosure')->name('disclosure');
    Route::get('/contact-us','contact')->name('contact');
    Route::get('/wealth-management','wealthManagement')->name('wealth_management');
    Route::get('/family-office-solutions','familySolutions')->name('family_solutions');
    Route::get('/insights/articles','insights')->name('insights');
    Route::get('/insights/articles/{slug}','showInsight')->name('showInsight');
    Route::get('/careers','careers')->name('careers');   
    Route::get('/download/client-relationship-summary','download')->name('download');
});

Route::controller(InquiryController::class)->group(function(){
    Route::post('/contact-us','storeInquiry')->name('inquiry.store');
});

Route::controller(NewsletterController::class)->group(function(){
    Route::post('/newletter-subscription', 'store')->name('newsletter.subscribe');
});


/* USER */
Route::middleware([
    'auth',    
    'verified'
    ])->name('user.')->group(function () {

    Route::controller(UserContactController::class)->group(function () {
        Route::get('/update-your-account-details', 'index')->name('get.personal');
        Route::post('/validate-personal-info', 'savePersonal')->name('info.personal');
        Route::get('/update-your-bio-details', 'getBio')->name('get.bio');
        Route::post('/validate-demographic-info', 'saveDemographic')->name('info.demographic');
        Route::get('/update-your-contact-details', 'getContact')->name('get.contact');
        Route::post('/validate-contact-info', 'saveContact')->name('info.saveContact');
    });    

    Route::middleware('confirmed.contact')->controller(\App\Http\Controllers\User\UserPagesController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/completed-account-update', 'allSet')->name('allSet');
        Route::get('/subscriptions', 'pricingTable')->name('deposit.pricingTable');
        Route::get('/make-deposit-transaction/{id}', 'depositCreate')->name('deposit.create');
        Route::get('/deposit-transaction/successful', 'depositComplete')->name('deposit.complete');
        Route::get('/deposit-history', 'depositHistory')->name('deposits');
        Route::get('/deposit/upload-receipt/{id}', 'depositReceipt')->name('deposit.upload');
        Route::get('/make-withdrawal-transaction', 'withdrawalCreate')->name('withdrawal.create');
        Route::get('/withdrawal-history', 'withdrawalHistory')->name('withdrawals');
        Route::get('/transactions-history', 'transactions')->name('transactions');
        Route::get('/payment-records', 'payments')->name('payments');
        Route::get('/payment-records/create', 'createPayment')->name('payment.create');
        Route::get('/payment-records/update/{id}', 'editPayment')->name('payment.edit');
        Route::post('/remove-session-data', 'removeSession')->name('remove.depositSession');
        Route::get('/rewards/referral-program', 'viewReferral')->name('referrals');
    });
});

Route::middleware('auth')->controller(VerificationCodeController::class)->group(function(){
    Route::post('/validate-code', 'validateCode')->name('user.validate.code');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
