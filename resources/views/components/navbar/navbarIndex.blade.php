<nav class="navbar fixed-top navbar-expand-lg navbar-light shadow" style="background-color: #00cba9;">
    {{-- #00cba9 --}}
    <div class="container">
        <a class="navbar-brand text-white p-2" href="#carousel-hed">
            <img src="{{ asset('assets/logo/logo-removebg.png') }}" alt="" width="50">
            {{-- Home --}}

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0">

                <div class="d-flex bd-highlight">
                    <li class="nav-item mt-1">
                        <div class="flex-grow-1 bd-highlight">
                            <a class="text-white text-uppercase nav-link" href="/">
                                Beranda
                            </a>
                        </div>
                    </li>
                </div>
                <div class="d-flex bd-highlight">
                    <li class="nav-item mt-1">
                        <div class="flex-grow-1 bd-highlight">
                            <a class="text-white text-uppercase nav-link {{ ($judul === " Tentang") ? 'active' : '' }}"
                                href="/about">
                                Tentang
                            </a>
                        </div>
                    </li>
                </div>
                <div class="d-flex bd-highlight">
                    <li class="nav-item mt-1">
                        <div class="flex-grow-1 bd-highlight">
                            <a class="nav-link text-uppercase text-white {{ ($judul === " Galeri") ? 'active' : '' }}"
                                href="/galeri-foto">
                                Galeri
                            </a>
                        </div>
                    </li>
                </div>
                <div class="d-flex bd-highlight">
                    <li class="nav-item mt-1">
                        <div class="flex-grow-1 bd-highlight">
                            <a class="nav-link text-uppercase text-white {{ ($judul === " Sejarah") ? 'active' : '' }}"
                                href="/sejarah">
                                Sejarah
                            </a>
                        </div>
                    </li>
                </div>
                {{-- <div class="d-flex bd-highlight">
                    <li class="nav-item mt-1">
                        <div class="flex-grow-1 bd-highlight">
                            <a class="text-white text-uppercase nav-link {{ ($judul === " Kontak") ? 'active' : '' }}"
                                href="#kontak">
                                Kontak
                            </a>
                        </div>
                    </li>
                </div> --}}
            </ul>
            @guest
            <a class="text-white btn btn-sm fw-bold text-uppercase" style="margin-left: -9px" href="/login"
                role="button">Login</a>
            @else
            <div class="bd-highlight">
                <a class="text-white btn btn-sm fw-bold text-uppercase" href="/dashboard" role="button">Dashboard</a>
            </div>
            @endguest
        </div>




    </div>
</nav>
