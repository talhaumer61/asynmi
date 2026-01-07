<style>
    .destination-card2 {
        overflow: hidden;
        border-radius: 12px;
    }

    .destination-card-img {
        display: block;
        width: 100%;
        height: 220px; /* control card height */
    }

    .destination-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* 🔥 keeps proportions */
        border-radius: 12px;
    }

</style>
<div class="destination-card2-slider-section mb-120 mt-120">
        <div class="container">
            <div class="row mb-50">
                <div class="col-lg-12">
                    <div class="section-title2 text-center">
                        <div class="eg-section-tag">
                            <span style="color: var(--primary-color1);">Journey</span>
                        </div>
                        <h2>Trendy Countries</h2>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper destination-card2-slider mb-50">
                        <div class="swiper-wrapper">
                             @foreach($countries as $country)
                                <div class="swiper-slide">
                                    <div class="destination-card2">
                                        <a href="{{ url('/country/'.$country->href) }}"
                                        class="destination-card-img">
                                            <img src="{{ asset($country->image) }}"
                                                alt="{{ $country->name }}">
                                        </a>

                                        {{-- OPTIONAL: enable later --}}
                                        {{--
                                        <div class="destination-card2-content">
                                            <span>Study In</span>
                                            <h4>
                                                <a href="{{ url('/country/'.$country->href) }}">
                                                    {{ $country->name }}
                                                </a>
                                            </h4>
                                        </div>
                                        --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="slide-and-view-btn-grp">
                            @if($countries->count() > 4)
                                <div class="slider-btn-grp3 two">
                                    <div class="slider-btn destination-card2-prev">
                                        <i class="bi bi-arrow-left"></i>
                                        <span>PREV</span>
                                    </div>
                                    <div class="slider-btn destination-card2-next">
                                        <span>NEXT</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </div>
                                </div>
                            @endif
                            <a href="{{ url('/countries') }}" class="secondary-btn2">
                                View All Countries
                            </a>
                        </div>

                </div>
            </div>
        </div>
    </div>