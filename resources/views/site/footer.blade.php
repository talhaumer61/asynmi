@php
    function footerVisible($elements, $name) {
        return optional(
            $elements->firstWhere('name', $name)
        )->is_visible == 1;
    }
@endphp

    <div class="d-flex justify-content-center p-5">
        <a href="/contact-us" class="primary-btn1 btn-lg btn">Refer a Friend
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M8.15624 10.2261L7.70276 12.3534L5.60722 18L6.85097 17.7928L12.6612 10.1948C13.4812 10.1662 14.2764 10.1222 14.9674 10.054C18.1643 9.73783 17.9985 8.99997 17.9985 8.99997C17.9985 8.99997 18.1643 8.26211 14.9674 7.94594C14.2764 7.87745 13.4811 7.8335 12.6611 7.80518L6.851 0.206972L5.60722 -5.41705e-07L7.70276 5.64663L8.15624 7.77386C7.0917 7.78979 6.37132 7.81403 6.37132 7.81403C6.37132 7.81403 4.90278 7.84793 2.63059 8.35988L0.778036 5.79016L0.000253424 5.79016L0.554115 8.91458C0.454429 8.94514 0.454429 9.05483 0.554115 9.08539L0.000253144 12.2098L0.778036 12.2098L2.63059 9.64035C4.90278 10.1523 6.37132 10.1857 6.37132 10.1857C6.37132 10.1857 7.0917 10.2102 8.15624 10.2261Z"></path>
                <path d="M12.0703 11.9318L12.0703 12.7706L8.97041 12.7706L8.97041 11.9318L12.0703 11.9318ZM12.0703 5.23292L12.0703 6.0714L8.97059 6.0714L8.97059 5.23292L12.0703 5.23292ZM9.97892 14.7465L9.97892 15.585L7.11389 15.585L7.11389 14.7465L9.97892 14.7465ZM9.97892 2.41846L9.97892 3.2572L7.11389 3.2572L7.11389 2.41846L9.97892 2.41846Z"></path>
            </svg>
        </a>
    </div>

    
    <footer class="footer-section style-2">
        <div class="container">
            <div class="footer-top d-flex justify-content-between ">
                <div class="row justify-content-center mb-5">
                    <div class="text-center">
                        <div class="footer-widget">
                            <div class="footer-logo mb-3">
                                <a href="/">
                                    <img src="{{ asset('assets/img/logo.png') }}" style="height:120px" alt="">
                                </a>
                            </div>
                            <h3>
                                {{ $globalFooterCta?->footer_cta ?? 'Ready to start your journey?' }}
                            </h3>
                            <a href="{{ $globalFooterCta?->url ?? '#' }}" class="primary-btn1 mt-3">
                                {{ $globalFooterCta?->btn_text ?? 'Book an Appointment' }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row g-lg-4 gy-5 justify-content-center">
                    @php
                        // Get the sections ordered by your preference
                        $activeSections = $globalFooterNavElements->where('type', 'section')
                                            ->where('is_visible', 1)
                                            ->sortBy('sort_order');
                    @endphp

                    @foreach($activeSections as $column)
                        <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                            <div class="footer-widget">
                                <div class="widget-title">
                                    <h5>{{ $column->name }}</h5>
                                </div>
                                <ul class="widget-list">
                                    @if($column->name == 'Quick Link')
                                        {{-- Render items marked as footer links --}}
                                        @foreach($globalFooterNavElements->where('type', 'link')->where('location', 'footer')->where('is_visible', 1) as $link)
                                            <li><a href="/{{ Str::slug($link->name) }}">{{ $link->name }}</a></li>
                                        @endforeach
                                    
                                    @elseif($column->name == 'Countries')
                                        @foreach($globalFooterCountries as $country)
                                            <li><a href="/countries/{{ $country->href }}">{{ $country->name }}</a></li>
                                        @endforeach

                                    @elseif($column->name == 'Services')
                                        @foreach($globalServices as $service)
                                            <li><a href="/services/{{ $service->href }}">{{ $service->name }}</a></li>
                                        @endforeach

                                    @elseif($column->name == 'Courses')
                                        @foreach($globalCourses as $course)
                                            <li><a href="/courses/{{ $course->href }}">{{ $course->name }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endforeach

                    @if($globalContactInfo->addresses && count($globalContactInfo->addresses) > 0)
                        <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-lg-center justify-content-md-start">
                            <div class="footer-widget">
                                <div class="single-contact mb-40">
                                    <div class="widget-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                            <g clip-path="url(#clip0_1137_183)">
                                                <path
                                                    d="M14.3281 3.08241C13.2357 1.19719 11.2954 0.0454395 9.13767 0.00142383C9.04556 -0.000474609 8.95285 -0.000474609 8.86071 0.00142383C6.70303 0.0454395 4.76268 1.19719 3.67024 3.08241C2.5536 5.0094 2.52305 7.32408 3.5885 9.27424L8.05204 17.4441C8.05405 17.4477 8.05605 17.4513 8.05812 17.4549C8.25451 17.7963 8.60632 18 8.99926 18C9.39216 18 9.74397 17.7962 9.94032 17.4549C9.94239 17.4513 9.9444 17.4477 9.9464 17.4441L14.4099 9.27424C15.4753 7.32408 15.4448 5.0094 14.3281 3.08241ZM8.99919 8.15627C7.60345 8.15627 6.46794 7.02076 6.46794 5.62502C6.46794 4.22928 7.60345 3.09377 8.99919 3.09377C10.3949 3.09377 11.5304 4.22928 11.5304 5.62502C11.5304 7.02076 10.395 8.15627 8.99919 8.15627Z"/>
                                            </g>
                                        </svg>
                                        <h5>Address</h5>
                                    </div>
                                    @foreach($globalContactInfo->addresses as $address)
                                        <p class="mb-1">
                                            <span class="fw-bold ">{{ $address['city'] }} - </span>
                                            {{ $address['address'] }}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Address Column (Keep this separate or add as a section too) --}}
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-12 d-flex flex-md-row flex-column align-items-center justify-content-md-between justify-content-center flex-wrap gap-3">
                        <ul class="social-list">
                            <li>
                                <a href="{{ $globalContactInfo->facebook ? $globalContactInfo->facebook : 'javascript:void(0)' }}"><i class="bx bxl-facebook"></i></a>
                            </li>
                            <li>
                                <a href="{{ $globalContactInfo->twitter ? $globalContactInfo->twitter : 'javascript:void(0)' }}"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                                  </svg></a>
                            </li>
                            <li>
                                <a href="{{ $globalContactInfo->linkedin ? $globalContactInfo->linkedin : 'javascript:void(0)' }}"><i class="bx bxl-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="{{ $globalContactInfo->instagram ? $globalContactInfo->instagram : 'javascript:void(0)' }}"><i class="bx bxl-instagram"></i></a>
                            </li>
                        </ul>
                        <p>© Copyright {{ date('Y') }} <a href="/">ASYNMI</a></p> 
                        {{-- <div class="footer-right">
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </footer>