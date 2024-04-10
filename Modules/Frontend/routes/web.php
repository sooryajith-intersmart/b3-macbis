<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\app\Http\Controllers\FrontendController;
use Modules\Frontend\app\Http\Controllers\LanguageController;

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
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/our-story', [FrontendController::class, 'about'])->name('about');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{slug}', [FrontendController::class, 'blogDetails'])->name('blog.details');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/enquiry', [FrontendController::class, 'enquiry'])->name('enquiry');