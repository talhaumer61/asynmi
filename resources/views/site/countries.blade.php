@php
    $pageTitle = isset($href)?ucwords(str_replace('-', ' ', $href)) : 'Countries';
@endphp

@include('site.header')
@include('site.navbar')
    @if (isset($href))
        @include('site.include.countries.country_header')
        @include('site.include.countries.detail')
    @else
        @include('site.include.countries.breadcrumb')
        @include('site.include.countries.list')
    @endif

@include('site.footer')
@include('site.footer_links')