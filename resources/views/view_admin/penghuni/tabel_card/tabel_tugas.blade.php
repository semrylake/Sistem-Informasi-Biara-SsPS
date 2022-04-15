<div class="card-body">
    <a class="btn btn-info" href="/tambah-tugas/{{ $penghuni->slug }}">
        <i class="fas fa-fw fa-plus"></i> Tambah Tugas
    </a>
    <a class="btn text-dark" href="" style="border-color: black; margin-bottom: 1px;">
        <i class="fas fa-fw fa-retweet"></i> Refresh
    </a>
    <hr>
    <div class="table-responsive mt-2">
        <table class="table table-bordered" id="tabel_tugas" width="100%">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Tempat / Komunitas</th>
                    <th>Tahun</th>
                    <th>Tugas / Pekerjaan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody align="center">

                @forelse ($tugas as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->tempat }}</td>
                    <td>{{ $a->tahun }}</td>
                    <td>{{ $a->tugas }}</td>

                    <td>

                        <a href="/edit-tugas/{{ $a->slug }}" class="btn btn-sm btn-warning mt-1 mb-1"><i
                                class="fas fa-edit"></i> Edit</a>
                        <form action="/delete-tugas/{{ $a->slug }}" method="post" class="d-inline">
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
                    <td colspan="5">Tidak ada data</td>
                </tr>
                @endforelse

            </tbody>
        </table>

    </div>
</div>
