<header>
    <!-- Menu -->
    <div class="menu-area">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-lg-3 hamburger-menu position-relative">
                    <div class="menu-logo-wrap">
                        <a href="{{ route('guest.index') }}"><img
                                src="{{ asset('guest-assets/images/logo/logo-navbar.png') }}" style="height: 5rem;"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="nav-wrap d-flex justify-content-between align-items-center">
                        <div class="mainmenu text-right" style="padding-top: 2rem !important;">
                            <ul class="home-menu">
                                <li><a href="#visi">Visi Kami</a>
                                </li>
                                <li><a href="#mengapa">Mengapa?</a>
                                </li>
                                <li><a href="#struktur">Struktur Model </a>
                                </li>
                                <li><a href="#level">Tingkatan Level
                                        Praktik </a>
                                </li>
                                <li><a href="#tingkat-praktik">Praktik</a>
                                </li>
                                <li><a href="#pengembang">Pengembang</a></li>
                                <li><a href="{{ route('login') }}" class="d-lg-none">Login</a></li>
                            </ul>
                        </div>
                        <div class="menu-btn-wrap flex-shrink-0 d-none d-lg-block">
                            <a class="common-btn border-style border-style-transparent"
                                href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu end -->
</header>
