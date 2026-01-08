@php
    $pageTitle = 'FAQs';
@endphp

@include('site.header')
@include('site.navbar')

        @include('site.include.faqs.breadcrumb')
        @include('site.include.faqs.list')

@include('site.footer')
@include('site.footer_links')