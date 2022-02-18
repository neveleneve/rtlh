<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-dark fixed-top">
    <div class="container-fluid my-2">
        <a class="navbar-brand fw-bold" href="{{ route('landing') }}">
            <img height="24" src="https://upload.wikimedia.org/wikipedia/commons/c/cf/Logo_of_the_Ministry_of_Public_Works_and_Housing_of_the_Republic_of_Indonesia.svg" alt="">
        </a>
        <a class="navbar-brand text-white fs-5 fw-bold d-none d-lg-inline" href="{{ route('landing') }}">
            Kementerian PUPR
        </a>
        <a class="navbar-brand text-white fs-5 fw-bold d-lg-none d-inline">
            Kementerian PUPR
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('landing') }}">
                        <i class="fa fa-home d-none d-lg-inline"></i>
                        <span class="fw-bold d-lg-none d-inline">Beranda</span>
                    </a>
                </li>
                {{-- <li class="nav-item mx-2">
                    <a title="Profil Kementerian PUPR" class="nav-link" href="#">
                        <i class="fa fa-user-circle d-none d-lg-inline"></i>
                        <span class="fw-bold d-lg-none d-inline">Profil Kementerian PUPR</span>
                    </a>
                </li> --}}
                <li class="nav-item dropdown">
                    <a title="Informasi" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-info-circle d-none d-lg-inline"></i>
                        <span class="fw-bold d-lg-none d-inline">Informasi</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('kriteria') }}">
                                Kriteria Rumah Tidak Layak Huni
                            </a>
                        </li>
                        {{-- <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <hr class="dropdown-dividerd-lg-none d-inline">
                @auth
                <li class="nav-item d-none d-lg-inline">
                    <a class="nav-link ">{{ Auth::user()->name }}</a>
                </li>
                @endauth
                <li class="nav-item @auth dropdown @endauth">
                    @guest
                    <a title="Log In" class="nav-link" aria-current="page" href="{{ route('login') }}" title="Log In">
                        <i class="fa fa-sign-in-alt d-none d-lg-inline"></i>
                        <span class="fw-bold d-lg-none d-inline">Log In</span>
                    </a>
                    @else
                    <a title="Informasi" class="nav-link dropdown-toggle" href="#" id="navUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user-circle d-none d-lg-inline"></i>
                        <span class="fw-bold d-lg-none d-inline">{{ Auth::user()->name }} | Akun</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navUser">
                        <li>
                            <a href="{{ route('dashboard') }}" class="dropdown-item">
                                <i class="fa fa-user-cog"></i>
                                <span class="fw-bold ml-1">Dashboard Admin</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();" title="Log Out">
                                <i class="fa fa-sign-out-alt"></i>
                                <span class="fw-bold ml-1">Log Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    @endguest
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Profil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}
            </ul>

        </div>
    </div>
</nav>