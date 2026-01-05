<?php

use App\Http\Controllers\admin\AdminAboutUsController;
use App\Http\Controllers\admin\AdminAppointmentController;
use App\Http\Controllers\admin\AdminBlogsController;
use App\Http\Controllers\admin\AdminContactInfoController;
use App\Http\Controllers\admin\AdminCountriesController;
use App\Http\Controllers\admin\AdminCoursesController;
use App\Http\Controllers\admin\AdminEventsController;
use App\Http\Controllers\admin\AdminServicesController;
use App\Http\Controllers\admin\AdminUniversitiesController;
use App\Http\Controllers\site\AboutController;
use App\Http\Controllers\site\AppointmentController;
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

// APPOINTMENT
Route::get('/book-an-appointment', [AppointmentController::class, 'index'])->name('appointment');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

// ADMIN ROUTES
Route::prefix('portal')->group(function () {
    // Here you can include your admin routes, for example:
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    
    Route::get('/services/{action?}/{id?}', [AdminServicesController::class, 'index'])->name('admin.services');
    Route::post('/services/store', [AdminServicesController::class, 'store'])->name('admin.services.store');
    Route::post('/services/update/{id}', [AdminServicesController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{id}', [AdminServicesController::class, 'delete'])->name('admin.services.delete');

    Route::get('/blogs/{action?}/{id?}', [AdminBlogsController::class, 'index'])->name('admin.blogs');
    Route::post('/blogs/store', [AdminBlogsController::class, 'store'])->name('admin.blogs.store');
    Route::post('/blogs/update/{id}', [AdminBlogsController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{id}', [AdminBlogsController::class, 'destroy'])->name('admin.blogs.delete');

    Route::get('/courses/{action?}/{id?}', [AdminCoursesController::class, 'index'])->name('admin.courses');
    Route::post('/courses/store', [AdminCoursesController::class, 'store'])->name('admin.courses.store');
    Route::post('/courses/update/{id}', [AdminCoursesController::class, 'update'])->name('admin.courses.update');
    Route::delete('/course/{id}', [AdminCoursesController::class, 'destroy'])->name('admin.courses.delete');

    Route::get('/countries/{action?}/{id?}', [AdminCountriesController::class, 'index'])->name('admin.countries');
    Route::post('/countries/store', [AdminCountriesController::class, 'store'])->name('admin.countries.store');
    Route::post('/countries/update/{id}', [AdminCountriesController::class, 'update'])->name('admin.countries.update');
    Route::delete('/countries/{id}', [AdminCountriesController::class, 'delete'])->name('admin.countries.delete');

    Route::get('/universities/{action?}/{id?}', [AdminUniversitiesController::class, 'index'])->name('admin.universities');
    Route::post('/universities/store', [AdminUniversitiesController::class, 'store'])->name('admin.universities.store');
    Route::post('/universities/update/{id}', [AdminUniversitiesController::class, 'update'])->name('admin.universities.update');
    Route::delete('/universities/{id}', [AdminUniversitiesController::class, 'delete'])->name('admin.universities.delete');

    Route::get('/events/{action?}/{id?}', [AdminEventsController::class, 'index'])->name('admin.events');
    Route::post('/events/store', [AdminEventsController::class, 'store'])->name('admin.events.store');
    Route::post('/events/update/{id}', [AdminEventsController::class, 'update'])->name('admin.events.update');
    Route::delete('/event/{id}', [AdminEventsController::class, 'destroy'])->name('admin.events.delete');

    Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('admin.appointments');
    Route::get('/appointments/{id}', [AdminAppointmentController::class, 'show'])->name('admin.appointments.show');

    Route::get('/contact-info/{action?}', [AdminContactInfoController::class, 'index'])->name('admin.contact-info');
    Route::post('/contact-info/store', [AdminContactInfoController::class, 'store'])->name('admin.contact-info.store');
    Route::post('/contact-info/update/{id}', [AdminContactInfoController::class, 'update'])->name('admin.contact-info.update');

    Route::get('/about-us/{action?}/{id?}', [AdminAboutUsController::class, 'index'])
        ->name('admin.about');

    Route::post('/about-us/store', [AdminAboutUsController::class, 'store'])
        ->name('admin.about.store');

    Route::post('/about-us/update/{id}', [AdminAboutUsController::class, 'update'])
        ->name('admin.about.update');
});



