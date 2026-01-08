{{-- ================= HERO ================= --}}
<section class="service-hero pt-120 pb-80">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <h1 class="fw-bold mb-20">{{ $service->name }}</h1>

                @if($service->overview)
                    <p class="lead mb-30">
                            {{$service->overview}}
                    </p>
                @endif
            </div>

            <div class="col-lg-6 text-center">
                <img src="{{ asset($service->image ?? 'assets/img/placeholder.jpg') }}"
                     class="img-fluid rounded shadow"
                     style="max-height:420px; object-fit:cover;"
                     alt="{{ $service->name }}">
            </div>

        </div>
    </div>
</section>

{{-- ================= MAIN CONTENT ================= --}}
<section class="pb-120">
    <div class="container">
        <div class="row g-5">

            {{-- CONTENT --}}
            <div class="col-lg-8">

                {{-- DETAIL --}}
                <div class="service-content mb-60">
                    {!! $service->detail !!}
                </div>

                {{-- PROCESS (Optional Static UI Block) --}}
                <div class="service-process mb-60">
                    <h3 class="mb-30">How This Service Works</h3>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="process-box p-4 text-center shadow-sm rounded">
                                <span class="step">01</span>
                                <h6 class="mt-3 text-white">Consultation</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="process-box p-4 text-center shadow-sm rounded">
                                <span class="step">02</span>
                                <h6 class="mt-3 text-white">Planning</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="process-box p-4 text-center shadow-sm rounded">
                                <span class="step">03</span>
                                <h6 class="mt-3 text-white">Execution</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- STICKY SIDEBAR --}}
            <div class="col-lg-4">
                <div class="service-sidebar position-sticky" style="top:40px;">

                    <div class="p-4 mb-30 rounded shadow-lg bg-white">
                        <h5 class="mb-3">Need Help?</h5>
                        <p class="small text-muted">
                            Speak with our experts to get personalized guidance.
                        </p>

                        <a href="{{ url('/contact') }}" class="btn btn-primary w-100 mb-2">
                            Request Consultation
                        </a>

                        <a href="{{ $globalContactInfo->whatsapp ? 'https://wa.me/'.$globalContactInfo->whatsapp : 'javascript:void(0)' }}"
                           class="btn btn-outline-success w-100">
                            WhatsApp Us
                        </a>
                    </div>

                    <div class="p-4 rounded shadow-sm bg-light">
                        <h6 class="mb-3">Why Choose Us?</h6>
                        <ul class="list-unstyled small">
                            <li>✔ Expert Team</li>
                            <li>✔ Transparent Process</li>
                            <li>✔ Proven Results</li>
                            <li>✔ Dedicated Support</li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= RELATED SERVICES ================= --}}
@if($otherServices->count())
<section class="pb-80">
    <div class="container">

        <div class="text-center mb-50">
            <h3>Related Services</h3>
            <p class="text-muted">Explore more services we offer</p>
        </div>

        <div class="row g-4">

            @foreach($otherServices as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="service-card shadow-sm h-100 rounded overflow-hidden">

                        <img src="{{ asset($item->image ?? 'assets/img/placeholder.jpg') }}"
                             class="w-100"
                             style="height:200px; object-fit:cover;"
                             alt="{{ $item->name }}">

                        <div class="p-4 align-items-center d-flex flex-column">
                            <h6 class="mb-2">{{ $item->name }}</h6>
                            <a href="{{ route('services.detail', $item->href) }}"
                               class="btn btn-sm primary-btn1 mt-2 px-3 py-2">
                                View Service
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endif
