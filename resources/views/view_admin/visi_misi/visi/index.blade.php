@extends('templates.dashboard_admin')

@section('container')

@if (session('psn'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('psn') }}
</div>
@endif
@if (session('update_msg'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('update_msg') }}
</div>
@endif
@if (session('del_msg'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('del_msg') }}
</div>
@endif

<div class="card shadow mb-4">

    <div class="card-body">
        @if (count($visi) > 0)
        <a class="btn btn-warning" href="/edit-visi/{{ $visis->slug }}">
            <i class="fas fa-fw fa-plus"></i> Edit Visi
        </a>
        @else
        <a class="btn btn-info" href="/tambah-visi">
            <i class="fas fa-fw fa-plus"></i> Tambah Visi
        </a>
        @endif


        <a class="btn text-dark" href="" style="border-color: black; margin-bottom: 1px;">
            <i class="fas fa-fw fa-retweet"></i> Refresh
        </a>
        <hr>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Visi!</h4>
            @forelse ($visi as $a)
            <p>{{ $a->visi }}</p>
            @empty
            <p>Belum ada visi yang dimasukan</p>
            <hr>
            <p class="mb-0">Silahkan tambahkan visi dengan menekan tombol Tambah Visi!.</p>
            @endforelse



        </div>

    </div>
</div>
<div class="card shadow mb-4">

    <div class="card-body">

        <a class="btn btn-info" href="/tambah-misi">
            <i class="fas fa-fw fa-plus"></i> Tambah Misi
        </a>
        <a class="btn text-dark" href="" style="border-color: black; margin-bottom: 1px;">
            <i class="fas fa-fw fa-retweet"></i> Refresh
        </a>
        <hr>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Misi!</h4>
            @forelse ($misi as $a)
            <ul class="d-flex">
                <li>{{ $a->misi }}.
                    <a style="margin-left: -5px" class="btn btn-link text-primary"
                        href="/edit-misi/{{ $a->slug }}">Edit</a>
                    <form action="/delete-misi/{{ $a->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button style="margin-left: -15px" type="submit" title="Hapus" class="btn text-danger btn-link"
                            onclick="return confirm('Anda yakin ingin menghapus data ini??');">Hapus
                        </button>
                    </form>
                </li>
            </ul>
            @empty
            <p>Belum ada misi yang dimasukan</p>
            <hr>
            <p class="mb-0">Silahkan tambahkan misi dengan menekan tombol Tambah Misi!.</p>
            @endforelse



        </div>

    </div>
</div>

@endsection
