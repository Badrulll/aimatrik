<nav class="navbar navbar-expand navbar-light navbar-top">
    <div class="container-fluid">
        <a href="javascript:void(0)" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0">
                {{-- <li class="nav-item dropdown me-3">
                    <a class="nav-link active dropdown-toggle text-gray-600" id="notification-link"
                        href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static"
                        aria-expanded="false">
                        <span class="badge badge-notification bg-danger p-1">0</span>
                        <i class='bi bi-bell-fill bi-sub fs-4'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                        aria-labelledby="dropdownMenuButton">
                        <li class="dropdown-header">
                            <h6>Notifikasi</h6>
                        </li>
                        <div class="col-12" id="notification-card">

                            <li class="dropdown-item notification-item text-center">
                                <p>Tidak Ada Notifikasi</p>
                            </li>
                        </div>
                    </ul>
                </li> --}}
            </ul>
            <div class="dropdown">
                <a href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                            <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">
                                <img
                                    src="{{ isset($userProfileImage) ? asset('storage/' . $userProfileImage) : 'https://ui-avatars.com/api/?name=' . Auth::user()->username . '&background=2868d8&color=fff' }}" />
                            </div>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                    style="min-width: 11rem">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.setting.profile.index') }}"><i
                                class="icon-mid bi bi-person me-2"></i>
                            Profil</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.setting.security.index') }}"><i
                                class="icon-mid bi bi-shield me-2"></i>
                            Keamanan</a>
                    </li>
                    <hr>
                    <li>
                        <a href="javascript:void(0)"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                            class="dropdown-item"><i class="icon-mid bi bi-box-arrow-left me-2"></i>
                            Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
