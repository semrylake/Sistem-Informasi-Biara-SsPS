@extends('templates.dashboard_admin')

@section('container')

@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Login Success!</h5>
    {{ session('pesan') }} {{ Auth::user()->name }}
</div>
@endif

<div class="alert alert-primary text-dark" role="alert">
    <span style="font-weight: bold; font-size: 20px">{{ $today }}</span>

</div>

<div class="row">
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-cyan text-center text-white">
                <i class="fa fa-user m-b-5 font-16"></i>
                <h5 class="m-b-0 m-t-5 mt-2">{{ $jumlahpenghuni }}</h5>
                <small class="font-light">Total Penghuni</small>
            </div>
        </div>
    </div>
</div>

@endsection
