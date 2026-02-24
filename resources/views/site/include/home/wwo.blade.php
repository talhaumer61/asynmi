@php
    $offers = $homepageElement?->what_we_offer ?? [];
    
@endphp


<div class="feature-card-section mb-120">
    <img src="assets/img/home1/section-vector4.png" alt="" class="section-vector4">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-60">
                    <span>
                        <!-- icons unchanged -->
                        Why Us
                    </span>
                    <h2>What Asynmi Offers</h2>
                </div>
            </div>
        </div>

        <div class="row g-md-4 gy-5 justify-content-center">
            @forelse($offers as $offer)
                @php
                    $gradients = [
                        'linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%)',
                        'linear-gradient(to right, #d3cce3, #e9e4f0); ',
                        'linear-gradient(90deg, #efd5ff 0%, #515ada 100%)',
                        'linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%)',
                        'linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%)',
                        'linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%)',
                        
                    ];

                    $bg = $gradients[$loop->index % count($gradients)];
                @endphp
                <div class="col-xl-4 col-md-6">
                    <div class="feature-card" style="background: #c82232; color: white;">
                        <div class="feature-card-icon">

                            @if(!empty($offer['icon']))
                                <img 
                                    src="{{ asset($offer['icon']) }}" 
                                    alt="{{ $offer['name'] }}"
                                >
                            @else
                                <i class="fa fa-star"></i>
                            @endif

                        </div>

                        <div class="feature-card-content">
                            <h4 class="fw-bold">{{ $offer['name'] }}</h4>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    <p>No offers added yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
