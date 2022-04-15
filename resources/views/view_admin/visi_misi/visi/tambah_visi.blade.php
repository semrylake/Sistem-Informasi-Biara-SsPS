@extends('templates.dashboard_admin')

@section('container')

<a href="/visi-misi" class="btn btn-info shadow"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="card mt-3 border shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Form Tambah Visi</h6>
    </div>
    <form class="form-horizontal" action="/addVisi" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group mb-4">

                <label for="visi" class="control-label col-form-label">Visi</label>
                <textarea rows="5" autofocus type="text" name="visi" value="{{ old('visi') }}"
                    class="form-control @error('visi') is-invalid @enderror" id="visi" autocomplete="off"
                    required></textarea>
                <input type="hidden" readonly class="form-control shadow @error('slug') is-invalid @enderror" id="slug"
                    name="slug" value="{{ old('slug') }}" required>
                <div class="invalid-feedback text-danger">
                    @error('visi')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                {{-- <label class="col-md-3">Konfirmasi</label> --}}
                <div class="col-md-9">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="check" name="radio-stacked" required>
                        <label class="custom-control-label" for="check">Klik disini untuk konfirmasi admin!!</label>
                    </div>
                </div>
            </div>
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


<script>
    const nama = document.querySelector('#visi');
    const slug = document.querySelector('#slug');
    nama.addEventListener('change', function(){
        fetch('/createSlugVisi?nama='+(nama.value).substring(0,5))
        .then(response=>response.json())
        .then(data=>slug.value = data.slug)
    });
</script>

@endsection
