<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Modules\Admin\app\Http\Controllers\AboutController;
use Modules\Admin\app\Http\Controllers\AuthController;
use Modules\Admin\app\Http\Controllers\BlogController;
use Modules\Admin\app\Http\Controllers\BusinessController;
use Modules\Admin\app\Http\Controllers\ContactController;
use Modules\Admin\app\Http\Controllers\DashboardController;
use Modules\Admin\app\Http\Controllers\HomeController;
use Modules\Admin\app\Http\Controllers\MetaTagController;
use Modules\Admin\app\Http\Controllers\PageBannerController;
use Modules\Admin\app\Http\Controllers\ThemeSettingsController;
use Modules\Admin\app\Http\Controllers\SliderController;
use Modules\Admin\app\Http\Controllers\EnquiryController;

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

Route::prefix('b3-macbis-admin-portal')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => 'auth:admin'], function () {
        // dashboard
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        // theme settings
        Route::get('theme-settings', [ThemeSettingsController::class, 'index'])->name('theme-settings.index');
        Route::get('theme-settings/{theme_settings}/edit', [ThemeSettingsController::class, 'edit'])->name('theme-settings.edit');
        Route::post('theme-settings/{theme_settings}/update', [ThemeSettingsController::class, 'update'])->name('theme-settings.update');
        // update sort order
        Route::post('update-sort-order', [ThemeSettingsController::class, 'updateSortOrder'])->name('update-sort-order');
        // update status
        Route::post('update-status', [ThemeSettingsController::class, 'updateStatus'])->name('update-status');
        // slider
        Route::resource('slider', SliderController::class);
        // home
        Route::get('home/edit', [HomeController::class, 'edit'])->name('home.edit');
        Route::put('home/{home}/update', [HomeController::class, 'update'])->name('home.update');
        // about
        Route::get('about/edit', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('about/{about}/update', [AboutController::class, 'update'])->name('about.update');
        // contact
        Route::get('contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
        Route::put('contact/{contact}/update', [ContactController::class, 'update'])->name('contact.update');
        // blog
        Route::resource('blog', BlogController::class);
        // business
        Route::resource('business', BusinessController::class);
        // meta tag
        Route::get('meta-tag', [MetaTagController::class, 'index'])->name('meta-tag.index');
        Route::get('meta-tag/{meta_tag}/edit', [MetaTagController::class, 'edit'])->name('meta-tag.edit');
        Route::put('meta-tag/{meta_tag}', [MetaTagController::class, 'update'])->name('meta-tag.update');
        // page banner
        Route::get('page-banner', [PageBannerController::class, 'index'])->name('page-banner.index');
        Route::get('page-banner/{page_banner}/edit', [PageBannerController::class, 'edit'])->name('page-banner.edit');
        Route::put('page-banner/{page_banner}', [PageBannerController::class, 'update'])->name('page-banner.update');
        // enquiry
        Route::get('enquiry', [EnquiryController::class, 'index'])->name('enquiry.index');
        Route::delete('enquiry/{enquiry}', [EnquiryController::class, 'destroy'])->name('enquiry.destroy');
        Route::get('enquiry/export', [EnquiryController::class, 'export'])->name('enquiry.export');
    });
    Route::fallback(function () {
        if (request()->is('b3-macbis-admin-portal/*')) {
            return response()->view('admin::errors.404', [], Response::HTTP_NOT_FOUND);
        }
    });
});