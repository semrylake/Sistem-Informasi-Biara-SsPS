<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">
            <img src="{{ asset('assets/logo/logo.jpeg') }}" alt="" width="50">
            {{-- Home --}}
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger {{ ($judul === " Visi & Misi") ? 'active' : '' }}"
                        href="#visimisi">Visi & Misi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger {{ ($judul === " Galeri") ? 'active' : '' }}"
                        href="#galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger {{ ($judul === " Sejarah") ? 'active' : '' }}"
                        href="#berita">Sejarah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger {{ ($judul === " About") ? 'active' : '' }}"
                        href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger {{ ($judul === " Kontak") ? 'active' : '' }}"
                        href="#kontak">Kontak</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/login">Login</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/dashboard">Dashboard</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
