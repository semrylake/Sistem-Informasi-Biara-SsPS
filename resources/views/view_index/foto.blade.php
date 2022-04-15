@extends('templates.index')

@section('container')

<section id="galeri" class="mb-5 py-4" style="background-color: #f8f8f8;  margin-top: 95px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading fw-bold text-uppercase">Galeri</h2>

            </div>
        </div>
        <hr class="text-white">

        <div class="row">
            @foreach ($foto as $a)
            <div class="col-md-3 col-sm-4 p-2 portfolio-item">
                <a target="_blank" class="portfolio-link" data-toggle="modal" href="{{ asset('storage/'.$a->foto) }}">
                    <img class="img-fluid rounded" height="75%" src="{{ asset('storage/'.$a->foto) }}" alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection()
