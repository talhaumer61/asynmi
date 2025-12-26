@php
    $pageTitle = isset($href)?ucwords(str_replace('-', ' ', $href)) : 'Blogs';
@endphp

@include('site.header')
@include('site.navbar')
    @if (isset($href))
        @include('site.include.blogs.blog_header')
        @include('site.include.blogs.detail')
    @else
        @include('site.include.blogs.breadcrumb')
        @include('site.include.blogs.list')
    @endif

@include('site.footer')
@include('site.footer_links')