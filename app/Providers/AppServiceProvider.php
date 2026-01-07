<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Country;
use App\Models\Service;
use App\Models\Course;
use App\Models\ContactInfo;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {

            // Countries (for dropdowns, footer, etc.)
            $countries = Country::where('status', 1)->get();

            $footerCountries = Country::where('status', 1)->limit(6)->get();

            // Services
            $services = Service::where('status', 1)->get();

            // Courses
            $courses = Course::where('status', 1)->get();

            // Contact Info (only ONE active record)
            $contactInfo = ContactInfo::where('status', 1)->first();

            $view->with([
                'globalCountries'   => $countries,
                'globalServices'    => $services,
                'globalCourses'     => $courses,
                'globalContactInfo' => $contactInfo,
                'globalFooterCountries' => $footerCountries,
            ]);
        });
    }
}
