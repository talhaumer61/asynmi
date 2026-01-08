<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminAboutUsController;
use App\Http\Controllers\admin\AdminAdsController;
use App\Http\Controllers\admin\AdminAppointmentController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminBannerController;
use App\Http\Controllers\admin\AdminBlogsController;
use App\Http\Controllers\admin\AdminContactInfoController;
use App\Http\Controllers\admin\AdminCountriesController;
use App\Http\Controllers\admin\AdminCoursesController;
use App\Http\Controllers\admin\AdminEventsController;
use App\Http\Controllers\admin\AdminFaqsController;
use App\Http\Controllers\admin\AdminPartnersController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\AdminQueriesController;
use App\Http\Controllers\admin\AdminServicesController;
use App\Http\Controllers\admin\AdminUniversitiesController;

use App\Http\Controllers\site\AboutController;
use App\Http\Controllers\site\AppointmentController;
use App\Http\Controllers\site\BlogsController;
use App\Http\Controllers\site\ContactController;
use App\Http\Controllers\site\CountriesController;
use App\Http\Controllers\site\CoursesController;
use App\Http\Controllers\site\EventsController;
use App\Http\Controllers\site\FaqsController;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\site\ServicesController;
use App\Http\Middleware\AdminAuth;

// -----------------------------------------------------------------------------
// 🔹 Detect Subdomain
// -----------------------------------------------------------------------------
$adminDomain = env('ADMIN_DOMAIN', 'admin.asynmi.org');
$currentHost = request()->getHost();

// -----------------------------------------------------------------------------
// 🔹 ADMIN SUBDOMAIN ROUTES
// -----------------------------------------------------------------------------
if ($currentHost === $adminDomain) {

    // Redirect root of subdomain to the admin portal dashboard
    Route::get('/', fn() => redirect('/portal'));

    // Redirect /login on subdomain to /portal/login
    Route::get('/login', fn() => redirect('/portal/login'));

    // ---------------- ADMIN AUTH ---------------- //
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('/portal/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // ---------------- ADMIN ROUTES (Protected) ---------------- //
    Route::middleware([AdminAuth::class])->group(function () {

        Route::prefix('portal')->group(function () {

            // Dashboard
            Route::get('/', fn() => redirect()->route('admin.dashboard'));
            Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

            // Services
            Route::get('/services/{action?}/{id?}', [AdminServicesController::class, 'index'])->name('admin.services');
            Route::post('/services/store', [AdminServicesController::class, 'store'])->name('admin.services.store');
            Route::post('/services/update/{id}', [AdminServicesController::class, 'update'])->name('admin.services.update');
            Route::delete('/services/{id}', [AdminServicesController::class, 'delete'])->name('admin.services.delete');

            // Blogs
            Route::get('/blogs/{action?}/{id?}', [AdminBlogsController::class, 'index'])->name('admin.blogs');
            Route::post('/blogs/store', [AdminBlogsController::class, 'store'])->name('admin.blogs.store');
            Route::post('/blogs/update/{id}', [AdminBlogsController::class, 'update'])->name('admin.blogs.update');
            Route::delete('/blogs/{id}', [AdminBlogsController::class, 'destroy'])->name('admin.blogs.delete');

            // Courses
            Route::get('/courses/{action?}/{id?}', [AdminCoursesController::class, 'index'])->name('admin.courses');
            Route::post('/courses/store', [AdminCoursesController::class, 'store'])->name('admin.courses.store');
            Route::post('/courses/update/{id}', [AdminCoursesController::class, 'update'])->name('admin.courses.update');
            Route::delete('/courses/{id}', [AdminCoursesController::class, 'destroy'])->name('admin.courses.delete');

            // Countries
            Route::get('/countries/{action?}/{id?}', [AdminCountriesController::class, 'index'])->name('admin.countries');
            Route::post('/countries/store', [AdminCountriesController::class, 'store'])->name('admin.countries.store');
            Route::post('/countries/update/{id}', [AdminCountriesController::class, 'update'])->name('admin.countries.update');
            Route::delete('/countries/{id}', [AdminCountriesController::class, 'delete'])->name('admin.countries.delete');

            // Universities
            Route::get('/universities/{action?}/{id?}', [AdminUniversitiesController::class, 'index'])->name('admin.universities');
            Route::post('/universities/store', [AdminUniversitiesController::class, 'store'])->name('admin.universities.store');
            Route::post('/universities/update/{id}', [AdminUniversitiesController::class, 'update'])->name('admin.universities.update');
            Route::delete('/universities/{id}', [AdminUniversitiesController::class, 'delete'])->name('admin.universities.delete');

            // Events
            Route::get('/events/{action?}/{id?}', [AdminEventsController::class, 'index'])->name('admin.events');
            Route::post('/events/store', [AdminEventsController::class, 'store'])->name('admin.events.store');
            Route::post('/events/update/{id}', [AdminEventsController::class, 'update'])->name('admin.events.update');
            Route::delete('/events/{id}', [AdminEventsController::class, 'destroy'])->name('admin.events.delete');

            // FAQs
            Route::get('/faqs/{action?}/{id?}', [AdminFaqsController::class, 'index'])->name('admin.faqs');
            Route::post('/faqs/store', [AdminFaqsController::class, 'store'])->name('admin.faqs.store');
            Route::post('/faqs/update/{id}', [AdminFaqsController::class, 'update'])->name('admin.faqs.update');
            Route::delete('/faqs/{id}', [AdminFaqsController::class, 'destroy'])->name('admin.faqs.delete');

            // Partners
            Route::get('/partners/{action?}/{id?}', [AdminPartnersController::class, 'index'])->name('admin.partners');
            Route::post('/partners/store', [AdminPartnersController::class, 'store'])->name('admin.partners.store');
            Route::post('/partners/update/{id}', [AdminPartnersController::class, 'update'])->name('admin.partners.update');
            Route::delete('/partners/{id}', [AdminPartnersController::class, 'destroy'])->name('admin.partners.delete');

            // About Us
            Route::get('/about-us/{action?}/{id?}', [AdminAboutUsController::class, 'index'])->name('admin.about');
            Route::post('/about-us/store', [AdminAboutUsController::class, 'store'])->name('admin.about.store');
            Route::post('/about-us/update/{id}', [AdminAboutUsController::class, 'update'])->name('admin.about.update');

            // Ads
            Route::get('/ads/{action?}/{id?}', [AdminAdsController::class, 'index'])->name('admin.ads');
            Route::post('/ads/store', [AdminAdsController::class, 'store'])->name('admin.ads.store');
            Route::post('/ads/update/{id}', [AdminAdsController::class, 'update'])->name('admin.ads.update');
            Route::delete('/ads/{id}', [AdminAdsController::class, 'destroy'])->name('admin.ads.delete');

            // Appointment
            Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('admin.appointments');
            Route::get('/appointments/{id}', [AdminAppointmentController::class, 'show'])->name('admin.appointments.show');

            // Queries
            Route::get('/queries', [AdminQueriesController::class, 'index'])->name('admin.queries');
            Route::get('/queries/{id}', [AdminQueriesController::class, 'show'])->name('admin.queries.show');

            // Profile
            Route::get('/my-profile', [AdminProfileController::class, 'index'])->name('admin.profile');
            Route::put('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');

        });

    });

    // 🧩 Fallback for admin subdomain
    Route::fallback(fn() => redirect('/portal'));

} else {
    // -------------------------------------------------------------------------
    // 🔹 MAIN SITE ROUTES
    // -------------------------------------------------------------------------

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/countries', [CountriesController::class, 'index'])->name('countries');
    Route::get('/countries/{href}', [CountriesController::class, 'detail'])->name('countries.detail');

    Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
    Route::get('/blogs/{href}', [BlogsController::class, 'detail'])->name('blogs.detail');

    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/services/{href}', [ServicesController::class, 'detail'])->name('services.detail');

    Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
    Route::get('/courses/{href}', [CoursesController::class, 'detail'])->name('courses.detail');

    Route::get('/events', [EventsController::class, 'index'])->name('events');
    Route::get('/events/{href}', [EventsController::class, 'detail'])->name('events.detail');

    Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs');

    Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');

    Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');
    Route::post('/user-query', [ContactController::class, 'store'])->name('user.query.store');

    Route::get('/book-an-appointment', [AppointmentController::class, 'index'])->name('appointment');
    Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

    // 🧩 Fallback for main site
    Route::fallback(fn() => redirect('/'));
}
