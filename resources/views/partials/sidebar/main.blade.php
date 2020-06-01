
    <!-- main menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand"><img class="brand-logo" src="{{ asset('app-assets/images/logo/logo.png') }}"/>
                <h2 class="brand-text">B-Book</h2></a></li>
            <li class="nav-item d-none d-xl-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon feather icon-disc font-medium-4 primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- main menu content-->
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('end-user')}}"><i class="fa fa-user"></i>Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('materi')}}"><i class="fa fa-book"></i>Materi</a>
                </li>
            </ul>
        </div>
    </div>
      <!-- /main menu content-->

