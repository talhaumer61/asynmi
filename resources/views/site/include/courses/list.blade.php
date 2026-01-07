<div class="shop-section pt-120 mb-120">
    <div class="container">
        <div class="row g-md-4 gy-5">

            @foreach($courses as $course)
                <div class="col-lg-4 col-md-6">
                    <div class="product-card h-100">
                        <div class="product-card-img">
                            <a href="{{ route('courses.detail', $course->href) }}">
                                <img src="{{ asset($course->image ?? 'assets/img/placeholder.jpg') }}"
                                     class="w-100 rounded"
                                     style="height:260px; object-fit:cover;"
                                     alt="{{ $course->name }}">
                            </a>
                        </div>

                        <div class="product-card-content text-center mt-3 px-3">
                            <h6 class="fw-bold">
                                <a href="{{ route('courses.detail', $course->href) }}">
                                    {{ $course->name }}
                                </a>
                            </h6>

                            <a href="{{ route('courses.detail', $course->href) }}"
                               class="primary-btn1 btn-sm mt-2 px-3 py-2">
                                View Course
                            </a>
                        </div>

                        <span class="for-border"></span>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
