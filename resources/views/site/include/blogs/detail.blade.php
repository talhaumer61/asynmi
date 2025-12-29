<div class="blog-details-section pt-90 mb-120">
    <div class="container">

        {{-- ================= ROW 1 ================= --}}
        <div class="row g-lg-4 gy-4">

            @if($recentBlogs->count())
                {{-- ===== WITH RECENT POSTS ===== --}}

                {{-- IMAGE + TITLE --}}
                <div class="col-lg-8 order-1">
                    <div class="post-thumb mb-30">
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid w-100">
                    </div>

                    <div class="post-title mb-30">
                        <h1>{{ $blog->title }}</h1>
                    </div>
                </div>

                {{-- RECENT POSTS --}}
                <div class="col-lg-4 order-3 order-lg-2">
                    <div class="sidebar-area">
                        <div class="single-widget mb-30">
                            <h5 class="widget-title">Recent Posts</h5>

                            @foreach($recentBlogs as $recent)
                                <div class="recent-post-widget mb-20 d-flex align-items-center">
                                    <div class="recent-post-img me-3">
                                        <a href="{{ route('blogs.detail', $recent->href) }}">
                                            <img src="{{ asset($recent->image ?? 'assets/img/placeholder.jpg') }}"
                                                 alt="{{ $recent->title }}"
                                                 style="width:70px;height:70px;object-fit:cover;">
                                        </a>
                                    </div>

                                    <div class="recent-post-content">
                                        <span class="d-block small text-muted">
                                            {{ $recent->created_at->format('d M, Y') }}
                                        </span>
                                        <h6 class="mb-0">
                                            <a href="{{ route('blogs.detail', $recent->href) }}">
                                                {{ Str::limit($recent->title, 45) }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            @else
                {{-- ===== NO RECENT POSTS ===== --}}

                {{-- IMAGE --}}
                <div class="col-lg-6 order-1">
                    <div class="post-thumb mb-30 h-100">
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid w-100 h-100">
                    </div>
                </div>

                {{-- OVERVIEW --}}
                <div class="col-lg-6 order-2">
                    <div class="post-title mb-20">
                        <h1>{{ $blog->title }}</h1>
                    </div>

                    @if($blog->overview)
                        <div class="blog-overview">
                            {!! $blog->overview !!}
                        </div>
                    @endif
                </div>
            @endif

        </div>

        {{-- ================= ROW 2 (DETAIL FULL WIDTH) ================= --}}
        <div class="row mt-4">
            <div class="col-12">
                {!! $blog->detail !!}
            </div>
        </div>

    </div>
</div>
