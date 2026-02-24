@php
    function footerVisible($elements, $name) {
        return optional(
            $elements->firstWhere('name', $name)
        )->is_visible == 1;
    }
@endphp
<style>
    .newsletter-widget h5 {
        letter-spacing: 1px;
    }
    .newsletter-form .form-control:focus {
        background: rgba(255,255,255,0.1);
        border-color: var(--primary-color); /* adjust based on your theme */
        box-shadow: none;
    }
    .social-list li a:hover {
        transform: translateY(-3px);
        transition: all 0.3s ease;
    }
    .widget-list li {
        margin-bottom: 8px;
        transition: all 0.3s;
    }
    .widget-list li a:hover {
        padding-left: 5px;
        color: #fff;
    }
</style>
<div class="d-flex justify-content-center p-5">
    <a href="/contact-us" class="primary-btn1">Refer a Friend
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
            <path d="M8.15624 10.2261L7.70276 12.3534L5.60722 18L6.85097 17.7928L12.6612 10.1948C13.4812 10.1662 14.2764 10.1222 14.9674 10.054C18.1643 9.73783 17.9985 8.99997 17.9985 8.99997C17.9985 8.99997 18.1643 8.26211 14.9674 7.94594C14.2764 7.87745 13.4811 7.8335 12.6611 7.80518L6.851 0.206972L5.60722 -5.41705e-07L7.70276 5.64663L8.15624 7.77386C7.0917 7.78979 6.37132 7.81403 6.37132 7.81403C6.37132 7.81403 4.90278 7.84793 2.63059 8.35988L0.778036 5.79016L0.000253424 5.79016L0.554115 8.91458C0.454429 8.94514 0.454429 9.05483 0.554115 9.08539L0.000253144 12.2098L0.778036 12.2098L2.63059 9.64035C4.90278 10.1523 6.37132 10.1857 6.37132 10.1857C6.37132 10.1857 7.0917 10.2102 8.15624 10.2261Z"></path>
            <path d="M12.0703 11.9318L12.0703 12.7706L8.97041 12.7706L8.97041 11.9318L12.0703 11.9318ZM12.0703 5.23292L12.0703 6.0714L8.97059 6.0714L8.97059 5.23292L12.0703 5.23292ZM9.97892 14.7465L9.97892 15.585L7.11389 15.585L7.11389 14.7465L9.97892 14.7465ZM9.97892 2.41846L9.97892 3.2572L7.11389 3.2572L7.11389 2.41846L9.97892 2.41846Z"></path>
        </svg>
    </a>
</div>

<footer class="footer-section style-2">
    <div class="container">
        <div class="footer-top">
            <div class="row g-lg-4 gy-5">

                {{-- Column 1: Quick Links & Address --}}
                <div class="col-lg-5 col-md-6">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h5>Quick Links</h5>
                        </div>
                        <ul class="widget-list">
                            {{-- Now Sorted by sort_order and filtered by is_visible --}}
                            @foreach($globalFooterNavElements->where('type', 'link')->where('location', 'footer')->where('is_visible', 1)->sortBy('sort_order') as $link)
                                <li>
                                    <a href="/{{ Str::slug($link->name) }}">
                                        {{ $link->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        {{-- Address Section --}}
                        @if($globalContactInfo->addresses && count($globalContactInfo->addresses) > 0)
                            <div class="contact-info-area mt-4">
                                <div class="widget-title mb-2 d-flex align-items-center">
                                    <i class="bx bx-map-pin me-2" style="font-size: 1.2rem; color: var(--primary-color2);"></i>
                                    <h5 class="mb-0">Our Office</h5>
                                </div>
                                @foreach($globalContactInfo->addresses as $address)
                                    <p class="mb-2 small">
                                        <span class="fw-bold text-white">{{ $address['city'] }}:</span> 
                                        {{ $address['address'] }}
                                    </p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Column 2: Enhanced Newsletter --}}
                <div class="col-lg-7 col-md-6">
                    <div class="footer-widget newsletter-widget p-4 rounded" style="background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.05);">
                        <div class="widget-title">
                            <h5>Stay Informed</h5>
                        </div>
                        <p class="mb-4">Subscribe to our newsletter to receive latest updates, news, and special offers directly in your inbox.</p>

                        <form action="/newsletter-subscribe" method="POST" class="newsletter-form">
                            @csrf
                            <div class="newsletter-input-group position-relative">
                                <input type="email" name="email" class="form-control" 
                                       placeholder="Your email address..." required 
                                       style="height: 60px; padding-left: 20px; padding-right: 150px; border-radius: 30px; background: rgba(255,255,255,0.05); border: 1px solid white; color: white;">
                                <button type="submit" class="primary-btn1 position-absolute" 
                                        style="top: 5px; right: 5px; height: 50px; border-radius: 25px; padding: 0 25px; border:1px solid var(--primary-color2);">
                                    Subscribe <i class="bx bx-paper-plane ms-1"></i>
                                </button>
                            </div>
                            {{-- <small class="text-muted mt-2 d-block">We respect your privacy. Unsubscribe at any time.</small> --}}
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="row">
                <div class="col-lg-12 d-flex flex-md-row flex-column align-items-center justify-content-md-between justify-content-center flex-wrap gap-3">
                    <ul class="social-list">
                        @if($globalContactInfo->facebook)
                            <li><a href="{{ $globalContactInfo->facebook }}"><i class="bx bxl-facebook"></i></a></li>
                        @endif
                        @if($globalContactInfo->twitter)
                            <li><a href="{{ $globalContactInfo->twitter }}"><i class='bx bxl-twitter'></i></a></li>
                        @endif
                        @if($globalContactInfo->linkedin)
                            <li><a href="{{ $globalContactInfo->linkedin }}"><i class="bx bxl-linkedin"></i></a></li>
                        @endif
                        @if($globalContactInfo->instagram)
                            <li><a href="{{ $globalContactInfo->instagram }}"><i class="bx bxl-instagram"></i></a></li>
                        @endif
                    </ul>
                    <p class="mb-0">© Copyright {{ date('Y') }} <a href="/" class="fw-bold">ASYNMI</a>. All Rights Reserved.</p> 
                </div>
            </div>
        </div>
    </div>
</footer>


