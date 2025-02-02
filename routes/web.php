<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopDetailController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\ShopCheckoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PolicyController;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PembelianController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LaporanController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
});

Route::controller(ShopController::class)->group(function () {
    Route::get('/shop', 'index')->name('shop.index');
});

Route::controller(ShopDetailController::class)->group(function () {
    Route::get('/shop-detail/{slug}', 'index')->name('shop-detail.index');
});

Route::controller(ShopCartController::class)->group(function () {
    Route::get('/shop-cart', 'index')->name('shop-cart.index');
});

Route::controller(ShopCheckoutController::class)->group(function () {
    Route::get('/shop-checkout', 'index')->name('shop-checkout.index');
});

Route::controller(AccountController::class)->group(function () {
    Route::get('/my-account', 'index')->name('my-account.index');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/forgot-password', 'forgot')->name('forgot.index');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/register', 'register')->name('register.index');
});

Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'index')->name('about.index');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact.index');
});

Route::controller(PolicyController::class)->group(function () {
    Route::get('/privacy-policy', 'index')->name('privacy.index');
});

Route::controller(PolicyController::class)->group(function () {
    Route::get('/terms-policy', 'terms')->name('terms.index');
});

Route::controller(PolicyController::class)->group(function () {
    Route::get('/refund-policy', 'refund')->name('refund.index');
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
