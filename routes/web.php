<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopDetailController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\ShopCheckoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PembelianController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\LoginAdminController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop-detail/{slug}', [ShopDetailController::class, 'index'])->name('shop-detail.index');

Route::controller(ShopCartController::class)->group(function () {
    Route::get('/shop-cart', 'index')->name('shop-cart.index');
    Route::post('/cart/store', 'store')->name('cart.store');
    Route::put('/shop-cart/{cartId}', 'update')->name('shop-cart.update');
    Route::delete('/shop-cart/{cartId}', 'destroy')->name('shop-cart.remove');
    Route::post('/shop-cart/clear', 'clear')->name('shop-cart.clear');
});

// Cart dropdown AJAX route
Route::get('/cart/dropdown', [ShopCartController::class, 'getDropdownData'])
    ->name('cart.dropdown');

Route::controller(ShopCheckoutController::class)->group(function () {
    Route::get('/shop-checkout', 'index')->name('shop-checkout.index');
    Route::post('/shop-checkout/process', 'process')->name('shop-checkout.process');
    Route::get('/shop-checkout/success', 'success')->name('shop-checkout.success');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'login')->name('login.submit');
    Route::get('/register', 'register')->name('register.index');
    Route::post('/register', 'registerStore')->name('register.store');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/forgot-password', 'forgot')->name('forgot.index');
});

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/privacy-policy', [PolicyController::class, 'index'])->name('privacy.index');
Route::get('/terms-policy', [PolicyController::class, 'terms'])->name('terms.index');
Route::get('/refund-policy', [PolicyController::class, 'refund'])->name('refund.index');

// Checkout Routes
Route::prefix('checkout')->group(function () {
    Route::get('/', [ShopCheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [AccountController::class, 'index'])->name('my-account.index');
    Route::post('/my-account/update-details', [AccountController::class, 'updateAccountDetails'])->name('my-account.update-details');
    Route::post('/my-account/change-password', [AccountController::class, 'changePassword'])->name('my-account.change-password');
    Route::get('/order/{nomer_order}', [AccountController::class, 'orderDetails'])->name('order.details');
});

Route::controller(LoginAdminController::class)->prefix('back-login')->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/', 'postlogin')->name('postlogin');
});

Route::prefix('back/')->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard.index');
    });

    Route::resource('kategori', KategoriController::class);

    Route::resource('produk', ProdukController::class);

    Route::resource('pembelian', PembelianController::class);

    Route::resource('user-admin', UserController::class);

    Route::resource('admin', AdminController::class);

    Route::resource('faq', FaqController::class);

    Route::controller(LaporanController::class)->group(function () {
        Route::get('/laporan-pembelian', 'pembelian')->name('laporan.pembelian');
    });

});
