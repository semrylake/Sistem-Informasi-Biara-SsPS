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
        <h6 class="m-0 font-weight-bold">Form Tambah Data Tugas & Penempatan</h6>
    </div>

    <form class="form-horizontal" action="/addTugas" method="post" enctype="multipart/form-data">
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
                        <label for="tempat" class="control-label col-form-label">Tempat / Komunitas<sup
                                class="text-danger">*</sup></label>
                        <input autofocus type="text" name="tempat" value="{{ old('tempat') }}"
                            class="form-control @error('tempat') is-invalid @enderror" id="tempat" autocomplete="off"
                            required>
                        <input type="hidden" readonly class="form-control shadow @error('slug') is-invalid @enderror"
                            id="slug" name="slug" value="{{ old('slug') }}" required>
                        <input type="hidden" readonly
                            class="form-control shadow @error('penghuni_id') is-invalid @enderror" id="penghuni_id"
                            name="penghuni_id" value="{{ old('penghuni_id',$penghuni->id) }}" required>
                        <div class="invalid-feedback text-danger">
                            @error('tempat')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tahun" class="control-label col-form-label">Tahun</label>
                        <input type="text" name="tahun" value="{{ old('tahun') }}"
                            class="form-control @error('tahun') is-invalid @enderror" id="tahun" autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tahun')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tugas" class="control-label col-form-label">Tugas / Pekerjaan</label>
                        <input type="text" name="tugas" value="{{ old('tugas') }}"
                            class="form-control @error('tugas') is-invalid @enderror" id="tugas" autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tugas')
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
    const tempat = document.querySelector('#tempat');
    const slug = document.querySelector('#slug');
    tempat.addEventListener('change', function(){
        fetch('/createSlugTugas?tempat='+tempat.value)
        .then(response=>response.json())
        .then(data=>slug.value = data.slug)
    });
</script>


@endsection
