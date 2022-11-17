
<!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="navbar-brand"><img height="25" src="{{ asset('app-assets/images/logo/logo.png') }}"/></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="navbar-brand">BBOOK</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                             <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('home')}}" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="ficon feather icon-watch"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                             <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('end-user')}}" data-toggle="tooltip" data-placement="top" title="Users"><i class="ficon feather icon-user"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                             <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('materi')}}" data-toggle="tooltip" data-placement="top" title="Materi"><i class="ficon feather icon-book-open"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('petunjuk') }}" data-toggle="tooltip" data-placement="top" title="Petunjuk"><i class="ficon feather icon-clipboard"></i></a></li>
                       </ul>
                        <ul class="nav navbar-nav">
                             <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('materi/add') }}" data-toggle="tooltip" data-placement="top" title="Add Materi"><i class="ficon feather icon-plus"></i></a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            <i class="feather icon-power"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<!-- END: Header-->
