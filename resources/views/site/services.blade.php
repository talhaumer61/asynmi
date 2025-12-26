@php
    $pageTitle = isset($href)?ucwords(str_replace('-', ' ', $href)) : 'Services';
@endphp

@include('site.header')
@include('site.navbar')
    @if (isset($href))
        @include('site.include.services.service_header')
        @include('site.include.services.detail')
    @else
        @include('site.include.services.breadcrumb')
        @include('site.include.services.list')
    @endif

@include('site.footer')
@include('site.footer_links')