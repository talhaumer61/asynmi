@php
    $pageTitle = isset($href)? $event->name : 'Events';
@endphp

@include('site.header')
@include('site.navbar')
    @if (isset($href))
        @include('site.include.events.header')
        @include('site.include.events.detail')
    @else
        @include('site.include.events.breadcrumb')
        @include('site.include.events.list')
    @endif

@include('site.footer')
@include('site.footer_links')