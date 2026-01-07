<div class="tour-type-tab-slider-section mb-120">
        <img src="assets/img/home3/vector/tour-type-section-vector1.svg" alt="" class="section-vector1">
        <img src="assets/img/home3/vector/tour-type-section-vector1.svg" alt="" class="section-vector2">
        <div class="container">
            <div class="row mb-50">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="section-title2 two text-center">
                        <h2>Official Partner Universities</h2>
                        <p>We are working with world’s top universities to make it easy for you to choose.</p>
                    </div>
                </div>
            </div> 
            <div class="tab-slider-wrap">
                <div class="row mb-50">
                    <div class="col-lg-12">
                        <div class="nav nav-pills" id="pills-tab3" role="tablist">
                            <div class="swiper tour-tab-slider swiper-initialized swiper-horizontal swiper-backface-hidden">
                                <div class="swiper-wrapper">
                                    @foreach($partners as $index => $partner)
                                        <div class="swiper-slide">
                                            <div class="nav-item" role="presentation">
                                                <div class="nav-link {{ $index === 0 ? 'active' : '' }}">
                                                    <div class="icon">
                                                        <img 
                                                            src="{{ asset($partner->logo) }}" 
                                                            class="partner-logo"
                                                            alt="{{ $partner->name }}"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                            <div class="slider-btn-grp4">
                                <div class="slider-btn tour-tab-slider-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-9fe7d8d512e3c101c" aria-disabled="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 16 20">
                                        <path d="M15.9512 0.869644C13.5972 7.34699 13.5419 12.9847 15.8404 19.1322C15.9511 19.4021 15.8404 19.7319 15.6188 19.8819C15.3973 20.0618 15.0927 20.0318 14.8988 19.8219C10.1356 14.7839 5.28936 11.7252 0.470783 10.6756C0.193853 10.6157 1.79767e-06 10.3458 1.82127e-06 10.0759C1.84749e-06 9.77599 0.193853 9.50611 0.470783 9.44613C5.26167 8.36657 10.1633 5.24785 15.0096 0.179928C15.1204 0.0599765 15.2588 -1.97214e-06 15.425 -1.95762e-06C15.5358 -1.94793e-06 15.6465 0.0299873 15.7573 0.119951C15.9788 0.26989 16.0619 0.569767 15.9512 0.869644Z"></path>
                                    </svg>
                                </div> 
                                <div class="slider-btn tour-tab-slider-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-9fe7d8d512e3c101c" aria-disabled="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 16 20">
                                        <path d="M0.0488516 19.1304C2.40275 12.6531 2.45814 7.01538 0.159624 0.867897C0.0488521 0.598007 0.159624 0.268143 0.381167 0.118204C0.602711 -0.0617224 0.907334 -0.0317344 1.10118 0.17818C5.86437 5.21612 10.7106 8.27486 15.5292 9.32443C15.8061 9.38441 16 9.6543 16 9.92419C16 10.2241 15.8061 10.494 15.5292 10.5539C10.7383 11.6335 5.83668 14.7522 0.990413 19.8201C0.879641 19.9401 0.741176 20.0001 0.575018 20.0001C0.464247 20.0001 0.353474 19.9701 0.242703 19.8801C0.0211589 19.7302 -0.0619202 19.4303 0.0488516 19.1304Z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>