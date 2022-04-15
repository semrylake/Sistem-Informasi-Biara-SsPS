@extends('templates.index')

@section('container')

<div class="row" id="carousel-hed" style="background-color: #f3f4f5;">
    <div style="margin-top: 95px" id="carouselExampleDark" class="carousel carousel-dark slide col-lg-12 col-md-12"
        data-bs="carousel">
        <div class="carousel-indicators">

            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-current="true"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-current="true"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-current="true"
                aria-label="Slide 4"></button>


        </div>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="{{ asset('assets/carousel-img/'.$no.'.jpg') }}" style="width: 100%; height: 550px;" alt="..."
                    class="img-fluid d-block w-100">
                <div class="carousel-caption d-none d-md-block" style="margin-bottom: 13%">
                    <h1 class="fw-bolder text-white text-uppercase">Servarum Spritus Sancti (SSpS)</h1>
                    <h2 class="fw-bolder text-white text-uppercase">Flores Bagian Timur</h2>
                </div>
            </div>


        </div>
    </div>

</div>
</div>

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <h2 class="section-heading text-uppercase">Tentang Kami</h2>
            </div>
        </div>
        <hr>
        <div class="row text-center">
            <div class="col-md-3">
                {{-- <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-success"></i>
                    <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span> --}}
                <h4 class="service-heading">Visi</h4>
                <p class="text-muted">{{$visi->visi}}</p>
            </div>
            <div class="col-md-3">
                {{-- <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-success"></i>
                    <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                </span> --}}
                <h4 class="service-heading">Misi</h4>
                @forelse ($misi as $a)
                <p class="text-muted">{{ $a->misi }}</p>
                @empty
                <p class="text-muted">Comming Soon.</p>
                @endforelse

            </div>
            <div class="col-md-3">
                {{-- <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-success"></i>
                    <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                </span> --}}
                <h4 class="service-heading">Stratergi</h4>
                <p class="text-muted">Pemberdayaan Anggota untuk pemberdayan komunitas & masyarakat.</p>
            </div>
            <div class="col-md-3">
                {{-- <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-success"></i>
                    <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                </span> --}}
                <h4 class="service-heading">Nilai-nilai</h4>
                <p class="text-muted">Keyakinan akan berkat Allah</p>
                <p class="text-muted">Keberanian</p>
                <p class="text-muted">Keberanian</p>
                <p class="text-muted">Kerendahan hati</p>
                <p class="text-muted">Kesetiaan</p>
                <p class="text-muted">Kesiapsediaan</p>
                <p class="text-muted">Kepekaan</p>
                <p class="text-muted">Belarasa</p>
                <p class="text-muted">Ketekunan</p>
                <p class="text-muted">Pengorbanan</p>

            </div>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section id="galeri" style="background-color: #f3f4f5;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading fw-bold text-uppercase">Galeri</h2>

            </div>
        </div>
        <hr class="text-white">
        <div class="row mb-1">
            <div class="col">
                <a class="float-end text-decoration-none" href="/galeri-foto">Lihat lebih banyak</a>
            </div>
        </div>
        <div class="row">
            @forelse ($galeri as $a)
            <div class="col-md-4 col-sm-6 p-2 portfolio-item">
                <a target="_blank" class="portfolio-link" data-toggle="modal" href="{{ asset('storage/'.$a->foto) }}">
                    <img class="img-fluid rounded" height="75%" src="{{ asset('storage/'.$a->foto) }}" alt="">
                </a>
            </div>
            @empty

            @endforelse


        </div>
    </div>
</section>

<section id="sejarah">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading fw-bold text-uppercase">Sejarah</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    <li>
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2009-2011</h4>
                                <h4 class="subheading">Our Humble Beginnings</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>March 2011</h4>
                                <h4 class="subheading">An Agency is Born</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>December 2012</h4>
                                <h4 class="subheading">Transition to Full Service</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>July 2014</h4>
                                <h4 class="subheading">Phase Two Expansion</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>Be Part
                                <br>Of Our
                                <br>Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
