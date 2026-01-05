@php
    $pageTitle = 'Book an Appointment';
@endphp

@include('site.header')
@include('site.navbar')

        @include('site.include.appointment.breadcrumb')
        @include('site.include.appointment.form')

@include('site.footer')
@include('site.footer_links')