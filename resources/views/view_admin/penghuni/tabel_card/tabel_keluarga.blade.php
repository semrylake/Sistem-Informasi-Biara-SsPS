<div class="card-body">
    <a class="btn btn-info" href="/tambah-keluarga/{{ $penghuni->slug }}">
        <i class="fas fa-fw fa-plus"></i> Tambah Data keluarga
    </a>
    <a class="btn text-dark" href="" style="border-color: black; margin-bottom: 1px;">
        <i class="fas fa-fw fa-retweet"></i> Refresh
    </a>
    <hr>
    {{-- <p>Data kelurga kandung termasuk penghuni.</p> --}}
    <div class="table-responsive mt-2">
        <table class="table table-bordered" id="tabel_keluarga" width="100%">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Tanggal Kematian (Jika ada)</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody align="center">

                @forelse ($keluarga as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->status }}</td>
                    <td>{{ $a->tpt_lahir }}, {{ $a->tgl_lahir }}</td>
                    <td>{{ $a->alamat }}</td>
                    <td>{{ $a->tlpn }}</td>
                    <td>{{ $a->tgl_meninggal }}</td>

                    <td>

                        <a href="/edit-keluarga/{{ $a->slug }}" class="btn btn-sm btn-warning mt-1 mb-1"><i
                                class="fas fa-edit"></i> Edit</a>
                        <form action="/delete-keluarga/{{ $a->slug }}" method="post" class="d-inline">
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
                    <td colspan="8">Tidak ada data</td>
                </tr>
                @endforelse

            </tbody>
        </table>

    </div>
</div>
