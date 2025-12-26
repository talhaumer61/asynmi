<?php

use App\Http\Controllers\admin\AdminBlogsController;
use App\Http\Controllers\admin\AdminServicesController;
use App\Http\Controllers\site\AboutController;
use App\Http\Controllers\site\BlogsController;
use App\Http\Controllers\site\ContactController;
use App\Http\Controllers\site\CountriesController;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\site\ServicesController;
use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// COUNTRIES
Route::get('/countries', [CountriesController::class, 'index'])->name('countries');
Route::get('/countries/{href}', [CountriesController::class, 'detail'])->name('countries.detail');

// BLOGS
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
Route::get('/blogs/{href}', [BlogsController::class, 'detail'])->name('blogs.detail');

// SERVICES
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/services/{href}', [ServicesController::class, 'detail'])->name('services.detail');

// ABOUT US
Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');

// CONTACT US
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');

// ADMIN ROUTES
Route::prefix('portal')->group(function () {
    // Here you can include your admin routes, for example:
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/services/{action?}/{href?}', [AdminServicesController::class, 'index'])->name('admin.services');
    
    Route::get('/blogs/{action?}/{id?}', [AdminBlogsController::class, 'index'])->name('admin.blogs');
    Route::post('/blogs/store', [AdminBlogsController::class, 'store'])->name('admin.blogs.store');
    Route::post('/blogs/update/{id}', [AdminBlogsController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{id}', [AdminBlogsController::class, 'destroy'])->name('admin.blogs.delete');

});



