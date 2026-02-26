<div class="home1-banner-area p-0">
    <div class="container-fluid p-0">
        <div class="swiper home1-banner-slider swiper-fade">
            <div class="swiper-wrapper">

                @forelse($banners as $banner)
                    <div class="swiper-slide" style="border-radius: 0 0 0 0;">
                        <div class="home1-banner-wrapper" style="position: relative; width: 100%; border-radius: 0 0 0 0;">
                            
                            <img src="{{ asset($banner->image) }}" 
                                 alt="{{ $banner->title }}" 
                                 style="width: 100%; height: 100%; display: block; border-radius: 0 0 0 0;">

                            <div class="home1-banner-content-overlay" 
                                 style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center;">
                                
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="home1-banner-content">
                                                @if($banner->title)
                                                    <h1 style="color: #fff; font-size: calc(1.5rem + 2vw); font-weight: 700;">
                                                        {{ $banner->title }}
                                                    </h1>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> @empty
                    {{-- Fallback --}}
                    <div class="swiper-slide">
                        <div class="home1-banner-wrapper">
                            <img src="{{ asset('assets/img/home/img1.png') }}" style="width: 100%; height: auto;">
                        </div>
                    </div>
                @endforelse

            </div> <div class="slider-btn-grp">
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