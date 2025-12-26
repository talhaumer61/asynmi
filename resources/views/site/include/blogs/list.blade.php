<div class="blod-grid-section pt-120 mb-120">
    <div class="container">
        <div class="row g-md-4 gy-5 mb-70">

            @forelse($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-card-img-wrap">
                            <a href="{{ route('blogs.detail', $blog->href) }}" class="card-img">
                                <img src="{{ asset($blog->image ?? 'assets/img/placeholder.jpg') }}" alt="{{ $blog->title }}">
                            </a>
                            {{-- <span class="date">
                                <strong>{{ $blog->created_at->format('d') }}
                                {{ $blog->created_at->format('F') }}
                                </strong>
                            </span> --}}
                        </div>

                        <div class="blog-card-content">
                            <h5>
                                <a href="{{ route('blogs.detail', $blog->href) }}">
                                    {{ Str::limit($blog->title, 55) }}
                                </a>
                            </h5>

                            {{-- <p>{{ Str::limit(strip_tags($blog->overview), 100) }}</p> --}}

                            <div class="bottom-area">
                                <a href="{{ route('blogs.detail', $blog->href) }}">
                                    View Post
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12">
                                            <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round"/>
                                            <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h4>No blogs found</h4>
                </div>
            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $blogs->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
