<header class="aim-navbar" id="aimNavbar">
    <div class="container">
        <div class="aim-navbar-inner">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('guest.index') }}" class="aim-brand" aria-label="AIMATRIK Home">
                 <img src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                </a>
                <nav class="d-none d-lg-flex align-items-center" aria-label="Main navigation">
                    <ul class="aim-nav">
                        <li>
                            <a href="#visi" class="aim-nav-link">
                                Visi Kami
                            </a>
                        </li>
                        <li>
                            <a href="#mengapa" class="aim-nav-link">
                                Mengapa?
                            </a>
                        </li>
                        <li>
                            <a href="#struktur" class="aim-nav-link">
                                Struktur Model
                            </a>
                        </li>
                        <li>
                            <a href="#level" class="aim-nav-link">
                                Tingkatan Level Praktik
                            </a>
                        </li>
                        <li>
                            <a href="#tingkat-praktik" class="aim-nav-link">
                                Praktik
                            </a>
                        </li>
                        <li>
                            <a href="#pengembang" class="aim-nav-link">
                                Pengembang
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="d-none d-lg-block">
                    <a href="{{ route('login') }}" class="aim-login">
                        <span>
                            Login
                        </span>
                    </a>
                </div>
                <button type="button" class="aim-mobile-toggle d-lg-none" id="aimMobileToggle"
                    aria-label="Open navigation" aria-expanded="false">
                    <i class="bi bi-list"></i>
                </button>
            </div>
            <div class="aim-mobile-menu d-lg-none" id="aimMobileMenu">
                <nav aria-label="Mobile navigation">
                    <ul class="aim-nav">
                        <li>
                            <a href="#visi" class="aim-nav-link">
                                Visi Kami
                            </a>
                        </li>
                        <li>
                            <a href="#mengapa" class="aim-nav-link">
                                Mengapa?
                            </a>
                        </li>
                        <li>
                            <a href="#struktur" class="aim-nav-link">
                                Struktur Model
                            </a>
                        </li>
                        <li>
                            <a href="#level" class="aim-nav-link">
                                Tingkatan Level Praktik
                            </a>
                        </li>
                        <li>
                            <a href="#tingkat-praktik" class="aim-nav-link">
                                Praktik
                            </a>
                        </li>
                        <li>
                            <a href="#pengembang" class="aim-nav-link">
                                Pengembang
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="aim-login">
                                Login
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const toggle =
            document.getElementById(
                'aimMobileToggle'
            );

        const menu =
            document.getElementById(
                'aimMobileMenu'
            );


        if (!toggle || !menu) return;


        toggle.addEventListener(
            'click',
            function() {

                const isOpen =
                    menu.classList.toggle(
                        'show'
                    );


                toggle.setAttribute(
                    'aria-expanded',
                    isOpen
                );


                const icon =
                    toggle.querySelector('i');


                if (icon) {

                    icon.className =
                        isOpen ?
                        'bi bi-x-lg' :
                        'bi bi-list';

                }

            }
        );


        const links =
            menu.querySelectorAll(
                'a'
            );


        links.forEach(function(link) {

            link.addEventListener(
                'click',
                function() {

                    menu.classList.remove(
                        'show'
                    );


                    toggle.setAttribute(
                        'aria-expanded',
                        'false'
                    );


                    const icon =
                        toggle.querySelector('i');


                    if (icon) {

                        icon.className =
                            'bi bi-list';

                    }

                }
            );

        });

    });
</script>
