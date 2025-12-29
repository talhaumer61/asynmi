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
              </ul>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </div>