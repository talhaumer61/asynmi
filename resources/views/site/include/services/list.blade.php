<div class="shop-section pt-120 mb-120">
    <div class="container">
        <div class="row g-md-4 gy-5">

            @foreach($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="product-card h-100">
                        <div class="product-card-img">
                            <a href="{{ route('services.detail', $service->href) }}">
                                <img src="{{ asset($service->image ?? 'assets/img/placeholder.jpg') }}"
                                     class="w-100 rounded"
                                     style="height: 260px; object-fit: cover;"
                                     alt="{{ $service->name }}">
                            </a>
                        </div>

                        <div class="product-card-content text-center mt-3 px-3">
                            <h6 class="fw-bold">
                                <a href="{{ route('services.detail', $service->href) }}">
                                    {{ $service->name }}
                                </a>
                            </h6>

                            {{-- <p class="text-muted small">
                                {{ Str::limit(strip_tags($service->overview), 90) }}
                            </p> --}}

                            <a href="{{ route('services.detail', $service->href) }}"
                               class="primary-btn1 btn-sm mt-2 px-3 py-2">
                                Explore Service
                                
                            </a>
                        </div>
                        <span class="for-border"></span>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
