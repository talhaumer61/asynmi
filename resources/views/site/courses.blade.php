@php
    $pageTitle = isset($href)? $course->name : 'Courses';
@endphp

@include('site.header')
@include('site.navbar')
    @if (isset($href))
        @include('site.include.courses.header')
        @include('site.include.courses.detail')
    @else
        @include('site.include.courses.breadcrumb')
        @include('site.include.courses.list')
    @endif

@include('site.footer')
@include('site.footer_links')