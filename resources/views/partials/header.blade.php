<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>@lang('header.app_title')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">@lang('header.app_title')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if(Session::has('user'))
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>

                    <!-- User Account: style can be found in dropdown.less -->
                    <li>
                        <a href="{{ route('teacher.edit', Session::get('user')->id) }}">
                            <span class="hidden-xs">
                                {{ Session::get('user')->name}} 
                            </span>
                        </a>
                    </li>

                     <li>
                        <a href="{{ route('logout') }}" >
                            <span class="hidden-xs">
                                @lang('header.sign_out') 
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>