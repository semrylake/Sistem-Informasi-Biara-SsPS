@extends('templates.dashboard_admin')

@section('container')


@if (session('psn'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('psn') }}
</div>
@endif

<a href="/detail-penghuni/{{ $slug }}" class="btn btn-info shadow"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="card mt-3 border shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Form Tambah Data Kaul</h6>
    </div>

    <form class="form-horizontal" action="/addKaul" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="penghuni" class="control-label col-form-label">Nama penghuni<sup
                                class="text-danger">*</sup></label>
                        <input readonly autofocus type="text" name="penghuni" value="{{ $penghuni->nama }}"
                            class="form-control @error('penghuni') is-invalid @enderror" id="penghuni"
                            autocomplete="off" required>
                        <div class="invalid-feedback text-danger">
                            @error('penghuni')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama" class="control-label col-form-label">Nama Kaul<sup
                                class="text-danger">*</sup></label>
                        <input placeholder="Judul" autofocus type="text" name="nama" value="{{ old('nama') }}"
                            class="form-control @error('nama') is-invalid @enderror" id="nama" autocomplete="off"
                            required>
                        <input type="hidden" readonly class="form-control shadow @error('slug') is-invalid @enderror"
                            id="slug" name="slug" value="{{ old('slug') }}" required>
                        <input type="hidden" readonly
                            class="form-control shadow @error('penghuni_id') is-invalid @enderror" id="penghuni_id"
                            name="penghuni_id" value="{{ old('penghuni_id',$penghuni->id) }}" required>
                        <div class="invalid-feedback text-danger">
                            @error('nama')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl_kaul" class="control-label col-form-label">Tanggal</label>
                        <input placeholder="Tanggal" type="text" name="tgl_kaul" value="{{ old('tgl_kaul') }}"
                            class="form-control @error('tgl_kaul') is-invalid @enderror" id="tgl_kaul"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tgl_kaul')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tpt_kaul" class="control-label col-form-label">Tempat</label>
                        <input placeholder="Tempat" type="text" name="tpt_kaul" value="{{ old('tpt_kaul') }}"
                            class="form-control @error('tpt_kaul') is-invalid @enderror" id="tpt_kaul"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tpt_kaul')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="moto" class="control-label col-form-label">Moto</label>
                        <input placeholder="Moto" type="text" name="moto" value="{{ old('moto') }}"
                            class="form-control @error('moto') is-invalid @enderror" id="moto" autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('moto')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-danger">Tanda * wajib diinput</p>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" id="savereg" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </div>
    </form>


</div>

{{-- Script slug --}}
<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');
    nama.addEventListener('change', function(){
        fetch('/createSlugKaul?nama='+nama.value)
        .then(response=>response.json())
        .then(data=>slug.value = data.slug)
    });
</script>


@endsection
