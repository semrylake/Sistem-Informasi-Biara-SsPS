@extends('templates.dashboard_admin')

@section('container')

<div class="detail">
    <a href="/penghuni" class="btn btn-primary shadow"><i class="fas fa-arrow-left"></i>
        Kembali</a>
    @if (session('del_msg'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        {{ session('del_msg') }}
    </div>
    @endif
    <div class="card border mt-2 mb-5 shadow">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Detail Penghuni</h4>
        </div>
        <div class="card-body">
            <div class="row p-2">
                <div class="col-lg-4">
                    @if ($penghuni->foto)
                    <img src="{{ asset('storage/') }}/{{ $penghuni->foto }}" width="100%" class="product-image"
                        alt="Product Image">

                    @endif
                </div>
                <div class="col-lg-8">
                    <h3 class="text-dark text-uppercase mt-2">{{ $penghuni->nama }}</h3>
                    <p>Dari Paroki: {{ $penghuni->paroki }}</p>
                    <hr>
                    @include('view_admin.penghuni.data_detail_penghuni')
                </div>
            </div>

            <div class="row p-2">
                <div class="card col-md-12">
                    @include('view_admin.kaul.list_link_tab')
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="p-20">
                                @include('view_admin.penghuni.tabel_card.tabel_kaul')
                            </div>
                        </div>
                        <div class="tab-pane  p-20" id="tugas" role="tabpanel">
                            <div class="p-20">
                                @include('view_admin.penghuni.tabel_card.tabel_tugas')
                            </div>
                        </div>

                        <div class="tab-pane p-20" id="pendidikan" role="tabpanel">
                            <div class="p-20">
                                @include('view_admin.penghuni.tabel_card.tabel_pendidikan')
                            </div>
                        </div>

                        <div class="tab-pane p-20" id="karya" role="tabpanel">
                            <div class="p-20">
                                @include('view_admin.penghuni.tabel_card.tabel_kursus')
                            </div>
                        </div>
                        <div class="tab-pane p-20" id="keluarga" role="tabpanel">
                            <div class="p-20">
                                @include('view_admin.penghuni.tabel_card.tabel_keluarga')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
