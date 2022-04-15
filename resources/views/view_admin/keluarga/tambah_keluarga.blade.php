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
        <h6 class="m-0 font-weight-bold">Form Tambah Anggota Keluarga</h6>
    </div>

    <form class="form-horizontal" action="/addKeluarga" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="penghuni" class="control-label col-form-label">Nama penghuni</label>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama" class="control-label col-form-label">Nama Anggota Keluarga<sup
                                class="text-danger">*</sup></label>
                        <input autofocus type="text" name="nama" value="{{ old('nama') }}"
                            class="form-control @error('nama') is-invalid @enderror" id="nama" autocomplete="off"
                            required>
                        <input required type="hidden" readonly
                            class="form-control shadow @error('slug') is-invalid @enderror" id="slug" name="slug"
                            value="{{ old('slug') }}" required>
                        <input required type="hidden" readonly
                            class="form-control shadow @error('penghuni_id') is-invalid @enderror" id="penghuni_id"
                            name="penghuni_id" value="{{ old('penghuni_id',$penghuni->id) }}" required>
                        <div class="invalid-feedback text-danger">
                            @error('nama')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label></label>
                        <div class="form-label-group">
                            <select class=" form-control @error('jk') is-invalid @enderror" name="jk" id="jk">
                                <option></option>
                                <option id="jk" value="Laki-laki" {{ old('jk')=="Laki-laki" ? 'selected' : null}}
                                    class="form-control">Laki-laki</option>
                                <option id="jk" value="Perempuan" {{ old('jk')=="Perempuan" ? 'selected' : null}}
                                    class="form-control">Perempuan</option>

                            </select>
                            <div class="invalid-feedback text-danger">
                                @error('jk')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="status">Status Keluarga</label></label>
                        <div class="form-label-group">
                            <select class=" form-control @error('status') is-invalid @enderror" name="status"
                                id="status">
                                <option></option>
                                <option id="status" value="Orang Tua - Ayah" {{ old('status')=="Orang Tua - Ayah"
                                    ? 'selected' : null}} class="form-control">Orang Tua - Ayah</option>
                                <option id="status" value="Orang Tua - Ibu" {{ old('status')=="Orang Tua - Ibu"
                                    ? 'selected' : null}} class="form-control">Orang Tua - Ibu</option>
                                <option id="status" value="Saudara" {{ old('status')=="Saudara" ? 'selected' : null}}
                                    class="form-control">Saudara Kandung (Kakak / Adik)</option>

                            </select>
                            <div class="invalid-feedback text-danger">
                                @error('status')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tpt_lahir" class="control-label col-form-label">Tempat Lahir</label>
                        <input placeholder="Tempat Lahir" autofocus type="text" name="tpt_lahir"
                            value="{{ old('tpt_lahir') }}" class="form-control @error('tpt_lahir') is-invalid @enderror"
                            id="tpt_lahir" autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tpt_lahir')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl_lahir" class="control-label col-form-label">Tanggal Lahir</label>
                        <input placeholder="Tanggal Lahir" autofocus type="text" name="tgl_lahir"
                            value="{{ old('tgl_lahir') }}" class="form-control @error('tgl_lahir') is-invalid @enderror"
                            id="tgl_lahir" autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tgl_lahir')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl_meninggal" class="control-label col-form-label">Tanggal Kematian (Jika
                            Ada)</label>
                        <input placeholder="Tanggal Kematian (Kosongkan jika tidak ada)" autofocus type="text"
                            name="tgl_meninggal" value="{{ old('tgl_meninggal') }}"
                            class="form-control @error('tgl_meninggal') is-invalid @enderror" id="tgl_meninggal"
                            autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tgl_meninggal')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="tlpn" class="control-label col-form-label">Nomor Telepon</label>
                        <input autofocus type="text" name="tlpn" value="{{ old('tlpn') }}"
                            class="form-control @error('tlpn') is-invalid @enderror" id="tlpn" autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('tlpn')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="alamat" class="control-label col-form-label">Alamat Lengkap</label>
                        <input autofocus type="text" name="alamat" value="{{ old('alamat') }}"
                            class="form-control @error('alamat') is-invalid @enderror" id="alamat" autocomplete="off">
                        <div class="invalid-feedback text-danger">
                            @error('alamat')
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
        fetch('/createSlugKeluarga?nama='+nama.value)
        .then(response=>response.json())
        .then(data=>slug.value = data.slug)
    });
</script>


@endsection
