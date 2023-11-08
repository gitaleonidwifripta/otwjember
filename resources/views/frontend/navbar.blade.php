<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <div class="d-flex">
                <img class="icon-otw" src="{{ asset('assets/pict/icon-otw.png') }}" alt="Icon OTW">
                <img class="icon-logo" src="{{ asset('assets/pict/logo-otw.png') }}" alt="Icon OTW">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('app') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('feedback') }}">Kontak Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/booking' }}">Booking</a>
                    </li>
                    @if (Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item  dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hai,
                                {{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{route('dashboard')}}">
                                <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('riwayat.pesanan') }}">
                                <i class="fas fa-weight-hanging fa-sm fa-fw mr-2 text-gray-400"></i>
                                Riwayat Pesanan
                            </a>
                            </a><a class="dropdown-item" href="{{ route('admin.password') }}">
                                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ubah Password
                            </a>
                            <a class="dropdown-item" href="{{ route('login') }}" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    @elseif(Auth::check() && Auth::user()->role == 'user')
                    <li class="nav-item  dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hai,
                                {{ Auth::user()->name }}</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('riwayat.pesanan') }}">
                                {{-- <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> --}}
                                <i class="fas fa-weight-hanging fa-sm fa-fw mr-2 text-gray-400"></i>
                                Riwayat Pesanan
                            </a>
                            </a><a class="dropdown-item" href="{{ route('user.password') }}">
                                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ubah Password
                            </a>
                            <a class="dropdown-item" href="{{ route('login') }}" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    @elseif(Auth::check() && Auth::user()->role == 'mitra')
                    <li class="nav-item  dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hai,
                                {{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{route('dash.des')}}">
                                <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            </a><a class="dropdown-item" href="{{ route('mitra.password') }}">
                                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ubah Password
                            </a>
                            <a class="dropdown-item" href="{{ route('login') }}" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a type="button" class="btn btn-primary btn-login" href="{{ route('login') }}">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
