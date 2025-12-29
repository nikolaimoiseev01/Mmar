<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\Pages\Account\OrderDetailsPage;
use App\Livewire\Pages\Account\SettingsPage;
use App\Livewire\Pages\Account\WelcomePage;
use App\Livewire\Pages\Auth\ConfirmPasswordPage;
use App\Livewire\Pages\Auth\ForgotPasswordPage;
use App\Livewire\Pages\Auth\LoginPage;
use App\Livewire\Pages\Auth\RegisterPage;
use App\Livewire\Pages\Auth\ResetPasswordPage;
use App\Livewire\Pages\Auth\VerifyEmailPage;
use App\Livewire\Pages\Portal\AboutPage;
use App\Livewire\Pages\Portal\CartPage;
use App\Livewire\Pages\Portal\ContactUsPage;
use App\Livewire\Pages\Portal\FaqPage;
use App\Livewire\Pages\Portal\IndexPage;
use App\Livewire\Pages\Portal\InsightsPage;
use App\Livewire\Pages\Portal\PostPage;
use App\Livewire\Pages\Portal\ProductPage;
use App\Livewire\Pages\Portal\ShippingInfoPage;
use App\Livewire\Pages\Portal\ShopPage;
use App\Livewire\Pages\Portal\SizeGuidePage;
use App\Livewire\Pages\Portal\SustainabilityPage;
use Illuminate\Support\Facades\Route;


//region Auth Routes
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('guest')->group(function () {
    Route::get('register', RegisterPage::class)
        ->name('auth.register');

    Route::get('login', LoginPage::class)
        ->name('auth.login');

    Route::get('forgot-password', ForgotPasswordPage::class)
        ->name('auth.password.request');

    Route::get('reset-password/{token}', ResetPasswordPage::class)
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', VerifyEmailPage::class)
        ->name('auth.verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('auth.verification.verify');

    Route::get('confirm-password', ConfirmPasswordPage::class)
        ->name('auth.password.confirm');
});
//endregion Auth
//Route::middleware('auth')->group(function () {
    Route::get('/', IndexPage::class)->name('portal.index');
    Route::get('/shop', ShopPage::class)->name('portal.shop');
    Route::get('/wishlist', ShopPage::class)->name('portal.wishlist');
    Route::get('/shop/{slug}', ProductPage::class)->name('portal.product');
    Route::get('/cart', CartPage::class)->name('portal.cart');

    Route::get('/insights', InsightsPage::class)->name('portal.insights');
    Route::get('/post/{id}', PostPage::class)->name('portal.post');

    Route::get('/sustainability', SustainabilityPage::class)->name('portal.sustainability');
    Route::get('/about', AboutPage::class)->name('portal.about');
    Route::get('/contact', ContactUsPage::class)->name('portal.contact');
    Route::get('/faq', FaqPage::class)->name('portal.faq');
    Route::get('/size-guide', SizeGuidePage::class)->name('portal.size-guide');
    Route::get('/shipping-info', ShippingInfoPage::class)->name('portal.shipping-info');

Route::middleware('auth')->prefix('account')->group(function () {
    Route::get('welcome', WelcomePage::class)->middleware(['auth', 'verified'])->name('account.welcome');
    Route::get('order/1', OrderDetailsPage::class)->middleware(['auth', 'verified'])->name('account.order');
    Route::get('settings', SettingsPage::class)->middleware(['auth', 'verified'])->name('account.settings');
});

