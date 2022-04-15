@extends('templates.dashboard_admin')

@section('container')


@if (session('psn'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('psn') }}
</div>
@endif

<a href="/penghuni" class="btn btn-info shadow"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="card mt-3 border shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Form Tambah Penghuni</h6>
    </div>
    <form class="form-horizontal" action="/addPenghuni" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nama" class="control-label col-form-label">Nama Lengkap<sup
                        class="text-danger">*</sup></label>
                <input placeholder="Nama biara, baptis dan nama keluarga" autofocus type="text" name="nama"
                    value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    autocomplete="off" required>
                <input type="hidden" readonly class="form-control shadow @error('slug') is-invalid @enderror" id="slug"
                    name="slug" value="{{ old('slug') }}" required>
                <div class="invalid-feedback text-danger">
                    @error('nama')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="paroki" class="control-label col-form-label">Dari Paroki</label>
                <input autofocus type="text" name="paroki" value="{{ old('paroki') }}"
                    class="form-control @error('paroki') is-invalid @enderror" id="paroki" autocomplete="off" required>
                <div class="invalid-feedback text-danger">
                    @error('paroki')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tpt_lahir" class="control-label col-form-label">Tempat Lahir</label>
                        <input placeholder="Contoh: Kupang" type="text" name="tpt_lahir" value="{{ old('tpt_lahir') }}"
                            class="form-control @error('tpt_lahir') is-invalid @enderror" id="tpt_lahir"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tpt_lahir')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tgl_lahir" class="control-label col-form-label">Tanggal Lahir</label>
                        <input type="text" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                            class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tgl_lahir')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl_baptis" class="control-label col-form-label">Tanggal Baptis</label>
                        <input type="text" name="tgl_baptis" value="{{ old('tgl_baptis') }}"
                            class="form-control @error('tgl_baptis') is-invalid @enderror" id="tgl_baptis"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tgl_baptis')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tpt_baptis" class="control-label col-form-label">Tempat Baptis</label>
                        <input placeholder="Contoh: Kupang" type="text" name="tpt_baptis"
                            value="{{ old('tpt_baptis') }}"
                            class="form-control @error('tpt_baptis') is-invalid @enderror" id="tpt_baptis"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tpt_baptis')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pembaptis" class="control-label col-form-label">Dibaptis Oleh</label>
                        <input type="text" name="pembaptis" value="{{ old('pembaptis') }}"
                            class="form-control @error('pembaptis') is-invalid @enderror" id="pembaptis"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('pembaptis')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl_msk_biara" class="control-label col-form-label">Tanggal Masuk Biara</label>
                        <input type="text" name="tgl_msk_biara" value="{{ old('tgl_msk_biara') }}"
                            class="form-control @error('tgl_msk_biara') is-invalid @enderror" id="tgl_msk_biara"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tgl_msk_biara')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="biara_masuk_pertama" class="control-label col-form-label">Nama Biara</label>
                        <input type="text" placeholder="Contoh: Kupang" name="biara_masuk_pertama"
                            value="{{ old('biara_masuk_pertama') }}"
                            class="form-control @error('biara_masuk_pertama') is-invalid @enderror"
                            id="biara_masuk_pertama" autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('biara_masuk_pertama')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="no_pakaian" class="control-label col-form-label">Nomor Pakaian Biara</label>
                        <input min="1" type="number" name="no_pakaian" value="{{ old('no_pakaian') }}"
                            class="form-control @error('no_pakaian') is-invalid @enderror" id="no_pakaian"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('no_pakaian')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tgl_masuk_novisiat" class="control-label col-form-label">Tanggal Masuk
                            Novisiat</label>
                        <input type="text" name="tgl_masuk_novisiat" value="{{ old('tgl_masuk_novisiat') }}"
                            class="form-control @error('tgl_masuk_novisiat') is-invalid @enderror"
                            id="tgl_masuk_novisiat" autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tgl_masuk_novisiat')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="masuki_novisiat_di" class="control-label col-form-label">Tempat Novisiat</label>
                        <input type="text" name="masuki_novisiat_di" value="{{ old('masuki_novisiat_di') }}"
                            class="form-control @error('masuki_novisiat_di') is-invalid @enderror"
                            id="masuki_novisiat_di" autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('masuki_novisiat_di')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl_filial" class="control-label col-form-label">Filial Tahun</label>
                        <input type="text" placeholder="Contoh: 2021" name="tgl_filial" value="{{ old('tgl_filial') }}"
                            class="form-control @error('tgl_filial') is-invalid @enderror" id="tgl_filial"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tgl_filial')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="komunitas_filial" class="control-label col-form-label">Di Komunitas</label>
                        <input type="text" name="komunitas_filial" value="{{ old('komunitas_filial') }}"
                            class="form-control @error('komunitas_filial') is-invalid @enderror" id="komunitas_filial"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('komunitas_filial')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pekerjaan" class="control-label col-form-label">Menangani Pekerjaan
                            Di</label>
                        <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}"
                            class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('pekerjaan')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="foto" class="control-label col-form-label">Foto</label>
                <img class="img-preview mb-2 img-fluid col-sm-2">
                <input type="file" class=" form-control form-control-sm @error('foto') is-invalid @enderror" id="foto"
                    name="foto" value="{{ old('foto') }}" onchange="previewImage()">
                <div class="invalid-feedback text-danger">
                    <div class="invalid-feedback text-danger">
                        @error('foto')
                        {{ $message }}
                        @enderror
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
        fetch('/createSlugPenghuni?nama='+nama.value)
        .then(response=>response.json())
        .then(data=>slug.value = data.slug)
    });
</script>
{{-- Script image preview --}}
<script>
    function previewImage(params) {
    const image = document.querySelector('#foto');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display = 'block';
    imgPreview.style.height = '100px';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
    }
</script>


@endsection
