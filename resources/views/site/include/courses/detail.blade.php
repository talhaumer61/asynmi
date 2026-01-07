{{-- ================= COURSE HERO ================= --}}
<section class="service-hero pt-120 pb-80">
    <div class="container">
        <div class="row align-items-center g-5">

            {{-- TEXT --}}
            <div class="col-lg-6">
                <h1 class="fw-bold mb-20">{{ $course->name }}</h1>

                @if($course->overview)
                    <p class="lead mb-30">
                        {{ $course->overview }}
                    </p>
                @endif
            </div>

            {{-- IMAGE --}}
            <div class="col-lg-6 text-center">
                <img src="{{ asset($course->image ?? 'assets/img/placeholder.jpg') }}"
                     class="img-fluid rounded shadow"
                     style="max-height:420px; object-fit:cover;"
                     alt="{{ $course->name }}">
            </div>

        </div>
    </div>
</section>

{{-- ================= COURSE CONTENT ================= --}}
<section class="pb-120">
    <div class="container">
        <div class="row g-5">

            {{-- MAIN CONTENT --}}
            <div class="col-lg-8">

                {{-- COURSE DETAIL --}}
                <div class="course-detail-content mb-60">
                    {!! $course->detail !!}
                </div>

            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                <div class="course-sidebar position-sticky" style="top:40px;">

                    {{-- ENQUIRY BOX --}}
                    <div class="p-4 mb-30 rounded shadow bg-white">
                        <h5 class="mb-3">Interested in this Course?</h5>
                        <p class="small text-muted">
                            Get expert guidance, eligibility check, and admission support.
                        </p>

                        <a href="{{ url('/contact-us') }}"
                           class="btn btn-primary w-100 mb-2">
                            Apply Now
                        </a>

                        <a href="https://wa.me/xxxxxxxxx"
                           class="btn btn-outline-success w-100">
                            WhatsApp Advisor
                        </a>
                    </div>

                    {{-- OTHER COURSES --}}
                    @if($otherCourses->count())
                        <div class="p-4 rounded shadow-sm bg-light">
                            <h6 class="mb-3">Other Courses</h6>

                            <ul class="list-unstyled">
                                @foreach($otherCourses as $item)
                                    <li class="mb-3 d-flex align-items-center">

                                        <img src="{{ asset($item->image ?? 'assets/img/placeholder.jpg') }}"
                                             width="60"
                                             height="60"
                                             class="rounded me-3"
                                             style="object-fit:cover;"
                                             alt="{{ $item->name }}">

                                        <div>
                                            <a href="{{ route('courses.detail', $item->href) }}"
                                               class="fw-semibold d-block">
                                                {{ $item->name }}
                                            </a>
                                        </div>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>
