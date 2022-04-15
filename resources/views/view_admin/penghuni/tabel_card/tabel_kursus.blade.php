<div class="card-body">
    <a class="btn btn-info" href="/tambah-karya/{{ $penghuni->slug }}">
        <i class="fas fa-fw fa-plus"></i> Tambah Kursus / Karya
    </a>
    <a class="btn text-dark" href="" style="border-color: black; margin-bottom: 1px;">
        <i class="fas fa-fw fa-retweet"></i> Refresh
    </a>
    <hr>
    <div class="table-responsive mt-2">
        <table class="table table-bordered" id="tabel_karya" width="100%">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Jenis Kegiatan</th>
                    <th>Tahun</th>
                    <th>Tempat</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody align="center">

                @forelse ($karya as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->karya }}</td>
                    <td>{{ $a->tahun }}</td>
                    <td>{{ $a->tempat }}</td>

                    <td>

                        <a href="/edit-karya/{{ $a->slug }}" class="btn btn-sm btn-warning mt-1 mb-1"><i
                                class="fas fa-edit"></i> Edit</a>
                        <form action="/delete-karya/{{ $a->slug }}" method="post" class="d-inline">
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
