        <div class="sidebar-wrapper" data-layout="stroke-svg">
          <div class="logo-wrapper"><a href="/portal/dashboard"><img class="img-fluid" src="{{asset('assets/img/logo.png')}}" style="height: 50px;" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="/portal/dashboard"><img class="img-fluid" src="{{asset('assets/img/logo.png')}}" style="height: 35px;" alt=""></a></div>
          <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
              <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="/portal/dashboard"><img class="img-fluid" src="{{asset('assets/img/logo.png')}}" style="height: 35px;" alt=""></a>
                  <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                </li>
                <li class="pin-title sidebar-main-title">
                  <div> 
                    <h6>Pinned</h6>
                  </div>
                </li>
                {{-- <li class="sidebar-main-title">
                  <div>
                    <h6 class="lan-1">General</h6>
                  </div>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="#">
                        <svg class="stroke-icon">
                            <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{asset('admin/svg/icon-sprite.svg#fill-home')}}"></use>
                        </svg>
                        <span class="lan-3">Dashboard</span>
                    </a>
                </li> --}}
                <li class="sidebar-main-title">
                  <div>
                    <h6 class="">General</h6>
                  </div>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/dashboard">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                    </svg><span>Dashboard</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/services">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-widget')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-widget')}}"></use>
                    </svg><span>Services</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/blogs">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-layout')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-layout')}}"></use>
                    </svg><span>Blogs</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/courses">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-task')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-task')}}"></use>
                    </svg><span>Courses</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/countries">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-maps')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-maps')}}"></use>
                    </svg><span>Countries</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/universities">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-project')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-project')}}"></use>
                    </svg><span>Universities</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/events">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-animation')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-animation')}}"></use>
                    </svg><span>Events</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/appointments">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-others')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-others')}}"></use>
                    </svg><span>Appointment Requests</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/contact-info">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-contact')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-contact')}}"></use>
                    </svg><span>Contact Info</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/about-us">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-search')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-search')}}"></use>
                    </svg><span>About Us</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/banners">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-blog')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-blog')}}"></use>
                    </svg><span>Banners</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/ads">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-icons')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-icons')}}"></use>
                    </svg><span>Advertisements</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/portal/partners">
                    <svg class="stroke-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-user')}}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{asset('admin/svg/icon-sprite.svg#stroke-user')}}"></use>
                    </svg><span>Partners</span></a>
                </li>
              </ul>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </div>