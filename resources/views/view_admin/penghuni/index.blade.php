@extends('templates.dashboard_admin')

@section('container')

@if (session('psn_update'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('psn_update') }}
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


    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-dark">Daftar Penghuni</h4>
    </div>
    <div class="card-body">
        <a class="btn btn-info" href="/tambah-penghuni">
            <i class="fas fa-fw fa-plus"></i> Tambah
        </a>
        <a class="btn text-dark" href="" style="border-color: black; margin-bottom: 1px;">
            <i class="fas fa-fw fa-retweet"></i> Refresh
        </a>
        <hr>
        <div class="table-responsive mt-2">
            <table class="table table-bordered" id="zero_config" width="100%">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Foto</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody align="center">

                    @forelse ($penghuni as $a)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->tempat_lahir }}, {{ $a->tgl_lahir }}</td>
                        <td>
                            @if ($a->foto)
                            <img class="img-fluid rounded " style="height: 50px; width: 100px;"
                                src="{{ asset('storage/'.$a->foto) }}" />
                            @endif
                        </td>

                        <td>
                            <a href="/detail-penghuni/{{ $a->slug }}" class="btn btn-sm btn-success mt-1 mb-1"><i
                                    class="fas fa-eye"></i> Detail</a>
                            <a href="/edit-penghuni/{{ $a->slug }}" class="btn btn-sm btn-warning mt-1 mb-1"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <form action="/delete-penghuni/{{ $a->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" title="Hapus" class="btn-sm btn btn-danger "
                                    onclick="return confirm('Anda yakin ingin menghapus data ini??');"><i
                                        class=" fas fa-trash"></i> Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">Tidak ada data</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
