@php
    function navVisible($elements, $name) {
        return optional(
            $elements->firstWhere('name', $name)
        )->is_visible == 1;
    }
@endphp
@php
    // Collect visible nav items with your existing navVisible checks
    $headerItems = collect([
        ['name' => 'Home', 'href' => '/', 'visible' => navVisible($globalHeaderNavElements, 'Home')],
        ['name' => 'Countries', 'href' => '/countries', 'visible' => navVisible($globalHeaderNavElements, 'Countries')],
        ['name' => 'Services', 'href' => '/services', 'visible' => navVisible($globalHeaderNavElements, 'Services')],
        ['name' => 'Courses', 'href' => '/courses', 'visible' => navVisible($globalHeaderNavElements, 'Courses')],
        ['name' => 'Blogs', 'href' => '/blogs', 'visible' => navVisible($globalHeaderNavElements, 'Blogs')],
        ['name' => 'Events', 'href' => '/events', 'visible' => navVisible($globalHeaderNavElements, 'Events')],
        ['name' => 'About Us', 'href' => '/about-us', 'visible' => navVisible($globalHeaderNavElements, 'About Us')],
        ['name' => 'Contact Us', 'href' => '/contact-us', 'visible' => navVisible($globalHeaderNavElements, 'Contact Us')],
        ['name' => 'FAQs', 'href' => '/faqs', 'visible' => navVisible($globalHeaderNavElements, 'FAQs')],
    ])->filter(fn($item) => $item['visible']);

    $topItems = $headerItems->take(5);
    $moreItems = $headerItems->slice(5);
@endphp

<div class="top-bar style-2">
    <div class="topbar-left two">
        <div class="icon"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27">
                <g>
                    <path d="M9.84497 19.8136V25.0313C9.84583 25.2087 9.90247 25.3812 10.0069 25.5246C10.1112 25.6679 10.2581 25.7748 10.4266 25.8301C10.5951 25.8853 10.7767 25.8861 10.9457 25.8324C11.1147 25.7787 11.2625 25.6732 11.3682 25.5308L14.4203 21.3773L9.84497 19.8136ZM26.6468 0.156459C26.5201 0.0661815 26.3708 0.0127263 26.2155 0.00200482C26.0603 -0.00871662 25.9051 0.0237135 25.7671 0.0957086L0.454599 13.3145C0.308959 13.3914 0.188959 13.5092 0.109326 13.6535C0.0296936 13.7977 -0.00610776 13.962 0.00631628 14.1262C0.0187403 14.2905 0.0788492 14.4475 0.179266 14.5781C0.279683 14.7087 0.416039 14.8071 0.571599 14.8613L7.60847 17.2666L22.5946 4.45283L10.9981 18.4242L22.7915 22.4551C22.9085 22.4944 23.0327 22.5077 23.1554 22.4939C23.2781 22.4802 23.3963 22.4399 23.5017 22.3757C23.6072 22.3115 23.6973 22.225 23.7659 22.1223C23.8344 22.0196 23.8797 21.9032 23.8985 21.7812L26.9922 0.968709C27.0151 0.81464 26.995 0.657239 26.934 0.513898C26.8731 0.370556 26.7737 0.246854 26.6468 0.156459Z"></path>
                </g>
            </svg>
        </div>
        <div class="content">
            <span>Email:</span>
            <a href="mailto:{{ $globalContactInfo->email1 }}">{{ $globalContactInfo->email1 }}</a>
        </div>
    </div>
    {{-- <p>50% Off Your Next Trip. Hurry Up For your new Tour! <a href="#">Book Your Tour</a> </p> --}}
    <div class="topbar-right">
        <div class="social-icon-area">
            <ul>
                <li><a href="{{ $globalContactInfo->facebook ? $globalContactInfo->facebook : 'javascript:void(0)' }}"><i class="bx bxl-facebook"></i></a></li>
                <li><a href="{{ $globalContactInfo->twitter ? $globalContactInfo->twitter : 'javascript:void(0)' }}"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"></path>
                    </svg></a></li>
                <li><a href="{{ $globalContactInfo->linkedin ? $globalContactInfo->linkedin : 'javascript:void(0)' }}"><i class="bx bxl-linkedin"></i></a></li>
                <li><a href="{{ $globalContactInfo->instagram ? $globalContactInfo->instagram : 'javascript:void(0)' }}"><i class="bx bxl-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<header class="header-area style-1">
    {{-- Mobile Logo --}}
    <div class="header-logo d-lg-none d-flex">
        <a href="/"><img alt="image" class="img-fluid" style="height: 80px; width:auto;" src="{{asset('assets/img/logo.png')}}"></a>
    </div>

    {{-- Desktop Logo --}}
    <div class="company-logo d-lg-flex d-none">
        <a href="/"><img style="height: 80px; width:auto;" src="{{asset('assets/img/logo.png')}}" alt=""></a>
    </div>

    <div class="main-menu">
        {{-- Mobile Menu Logo --}}
        <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
            <div class="mobile-logo-wrap">
                <a href="/"><img alt="image" style="height: 80px; width:auto;" src="{{asset('assets/img/logo.png')}}"></a>
            </div>
            <div class="menu-close-btn">
                <i class="bi bi-x"></i>
            </div>
        </div>

        {{-- Menu List --}}
        <ul class="menu-list">
            {{-- Top 5 items --}}
            @foreach($topItems as $item)
                @php
                    // Check for children
                    $children = null;
                    if($item['name'] == 'Countries') $children = $globalCountries;
                    if($item['name'] == 'Services') $children = $globalServices;
                    if($item['name'] == 'Courses') $children = $globalCourses;
                @endphp

                <li class="{{ $children ? 'menu-item-has-children' : '' }}">
                    <a href="{{ $item['href'] }}" class="drop-down">{{ $item['name'] }}</a>
                    @if($children)
                        <i class="bi bi-plus dropdown-icon"></i>
                        <ul class="sub-menu">
                            @foreach($children as $child)
                                <li><a href="{{ $item['name'] == 'Countries' ? '/countries/'.$child->href : ($item['name'] == 'Services' ? '/services/'.$child->href : '/courses/'.$child->href) }}">{{ $child->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach

            {{-- More Dropdown --}}
            @if($moreItems->count() > 0)
                <li class="menu-item-has-children">
                    <a href="#" class="drop-down">More</a>
                    <i class="bi bi-plus dropdown-icon"></i>
                    <ul class="sub-menu">
                        @foreach($moreItems as $item)
                            @php
                                $children = null;
                                if($item['name'] == 'Countries') $children = $globalCountries;
                                if($item['name'] == 'Services') $children = $globalServices;
                                if($item['name'] == 'Courses') $children = $globalCourses;
                            @endphp

                            <li class="{{ $children ? 'menu-item-has-children' : '' }}">
                                <a href="{{ $item['href'] }}">{{ $item['name'] }}</a>
                                @if($children)
                                    <ul class="sub-menu">
                                        @foreach($children as $child)
                                            <li><a href="{{ $item['name'] == 'Countries' ? '/countries/'.$child->href : ($item['name'] == 'Services' ? '/services/'.$child->href : '/courses/'.$child->href) }}">{{ $child->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
        </ul>

        {{-- Mobile Hotline --}}
        <div class="hotline-area d-lg-none d-flex">
            <div class="content">
                <span>To More Inquiry</span>
                <h6><a href="tel:{{ $globalContactInfo->phone }}">{{ $globalContactInfo->phone }}</a></h6>
            </div>
        </div>
    </div>

    {{-- Desktop Hotline & Sidebar --}}
    <div class="nav-right d-flex justify-content-end align-items-center">
        <div class="hotline-area d-xl-flex d-none">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                    {{-- Hotline SVG Path --}}
                </svg>
            </div>
            <div class="content">
                <span>To More Inquiry</span>
                <h6><a href="tel:{{ $globalContactInfo->phone }}">{{ $globalContactInfo->phone }}</a></h6>
            </div>
        </div>

        <div class="sidebar-button mobile-menu-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
                <path d="M0 4.46439C0 4.70119 0.0940685 4.92829 0.261511 5.09574C0.428955 5.26318 0.656057 5.35725 0.892857 5.35725H24.1071C24.3439 5.35725 24.571 5.26318 24.7385 5.09574C24.9059 4.92829 25 4.70119 25 4.46439C25 4.22759 24.9059 4.00049 24.7385 3.83305C24.571 3.6656 24.3439 3.57153 24.1071 3.57153H0.892857C0.656057 3.57153 0.428955 3.6656 0.261511 3.83305C0.0940685 4.00049 0 4.22759 0 4.46439ZM4.46429 11.6072H24.1071C24.3439 11.6072 24.571 11.7013 24.7385 11.8688C24.9059 12.0362 25 12.2633 25 12.5001C25 12.7369 24.9059 12.964 24.7385 13.1315C24.571 13.2989 24.3439 13.393 24.1071 13.393H4.46429C4.22749 13.393 4.00038 13.2989 3.83294 13.1315C3.6655 12.964 3.57143 12.7369 3.57143 12.5001C3.57143 12.2633 3.6655 12.0362 3.83294 11.8688C4.00038 11.7013 4.22749 11.6072 4.46429 11.6072ZM12.5 19.643H24.1071C24.3439 19.643 24.571 19.737 24.7385 19.9045C24.9059 20.0719 25 20.299 25 20.5358C25 20.7726 24.9059 20.9997 24.7385 21.1672C24.571 21.3346 24.3439 21.4287 24.1071 21.4287H12.5C12.2632 21.4287 12.0361 21.3346 11.8687 21.1672C11.7012 20.9997 11.6071 20.7726 11.6071 20.5358C11.6071 20.299 11.7012 20.0719 11.8687 19.9045C12.0361 19.737 12.2632 19.643 12.5 19.643Z"></path>
            </svg>
        </div>
    </div>
</header>