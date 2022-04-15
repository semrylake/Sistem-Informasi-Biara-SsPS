@extends('templates.dashboard_admin')

@section('container')

@if (session('psn'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('psn') }}
</div>
@endif
@if (session('user_not_found'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Failed!</h5>
    {{ session('user_not_found') }}
</div>
@endif

<div class="card mt-3 border shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Form Ganti Password</h6>
    </div>
    <form class="form-horizontal" action="/updatePassword" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="username" class="control-label col-form-label">Username Sekarang</label>
                <input autofocus type="text" name="username" value="{{ old('username') }}"
                    class="form-control @error('username') is-invalid @enderror" id="username" autocomplete="off"
                    required>
                <input type="hidden" readonly class="form-control shadow @error('slug') is-invalid @enderror" id="slug"
                    name="slug" value="{{ old('slug') }}" required>
                <div class="invalid-feedback text-danger">
                    @error('username')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="control-label col-form-label">Password Baru</label>
                <input autofocus type="password" name="password" value="{{ old('password') }}"
                    class="form-control @error('password') is-invalid @enderror" id="password" autocomplete="off"
                    required>

                <div class="invalid-feedback text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
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
    const nama = document.querySelector('#misi');
    const slug = document.querySelector('#slug');
    nama.addEventListener('change', function(){
        fetch('/createSlugMisi?nama='+(nama.value).substring(0,5))
        .then(response=>response.json())
        .then(data=>slug.value = data.slug)
    });
</script>

@endsection
