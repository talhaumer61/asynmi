<div class="home1-banner-area">
    <div class="container-fluid">
        <div class="swiper home1-banner-slider swiper-fade">
            <div class="swiper-wrapper">

                @forelse($banners as $banner)
                    <div class="swiper-slide">
                        <div class="home1-banner-wrapper"
                             style="background-image: url('{{ asset($banner->image) }}');">

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="home1-banner-content">

                                            {{-- Optional title --}}
                                            @if($banner->title)
                                                <h1>{{ $banner->title }}</h1>
                                            @endif

                                            <div class="banner-content-bottom">
                                                <a href="tel:{{ $globalContactInfo->phone }}" class="btn-inquiry">
                                                    <i class="bi bi-telephone-fill"></i>
                                                    <div class="text-content">
                                                        <span>To More Inquiry</span>
                                                        <strong>{{ $globalContactInfo->phone }}</strong>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    {{-- Fallback banner --}}
                    <div class="swiper-slide">
                        <div class="home1-banner-wrapper"
                             style="background-image: url('{{ asset('assets/img/home/img1.png') }}');">
                        </div>
                    </div>
                @endforelse

            </div>

            <!-- Slider Navigation -->
            <div class="slider-btn-grp">
                <div class="slider-btn home1-banner-prev">
                    <i class="bi bi-arrow-left"></i>
                </div>
                <div class="slider-btn home1-banner-next">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>

        </div>
    </div>
</div>
