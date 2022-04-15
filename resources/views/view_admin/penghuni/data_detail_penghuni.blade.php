Dilahirkan tanggal
@if ($penghuni->tgl_lahir == null)
................ di
@else
<span class="font-weight-bold">{{ $penghuni->tgl_lahir }} </span> di
@endif

@if ($penghuni->tpt_lahir == null)
................ dan dibaptis tanggal
@else
<span class="font-weight-bold">{{ $penghuni->tpt_lahir }} </span> dan dibaptis tanggal
@endif

@if ($penghuni->tgl_baptis == null)
................ di
@else
<span class="font-weight-bold">{{ $penghuni->tgl_baptis }} </span> di
@endif

@if ($penghuni->tpt_baptis == null)
................ oleh
@else
<span class="font-weight-bold">{{ $penghuni->tpt_baptis }} </span> oleh
@endif

@if ($penghuni->pembaptis == null)
................. . Masuk biara tanggal
@else
<span class="font-weight-bold">{{ $penghuni->pembaptis }} </span>. Masuk biara tanggal
@endif

@if ($penghuni->tgl_msk_biara == null)
................. di
@else
<span class="font-weight-bold">{{ $penghuni->tgl_msk_biara }} </span> di
@endif

@if ($penghuni->biara_masuk_pertama == null)
................. . Nomor pakaian biara
@else
<span class="font-weight-bold">{{ $penghuni->biara_masuk_pertama }} </span>. Nomor pakaian biara
@endif

@if ($penghuni->no_pakaian == null)
................. . Masuk novisiat tanggal
@else
<span class="font-weight-bold">{{ $penghuni->no_pakaian }} </span>. Masuk novisiat tanggal
@endif

@if ($penghuni->tgl_masuk_novisiat == null)
................. di
@else
<span class="font-weight-bold">{{ $penghuni->tgl_masuk_novisiat }} </span> di
@endif

@if ($penghuni->masuki_novisiat_di == null)
................. dan filial tahun
@else
<span class="font-weight-bold">{{ $penghuni->masuki_novisiat_di }} </span> dan filial tahun
@endif

@if ($penghuni->tgl_filial == null)
................. di komunitas
@else
<span class="font-weight-bold">{{ $penghuni->tgl_filial }} </span> di komunitas
@endif

@if ($penghuni->komunitas_filial == null)
................. dan menangani pekerjaan di
@else
<span class="font-weight-bold">{{ $penghuni->komunitas_filial }} </span> dan menangani pekerjaan di
@endif

@if ($penghuni->pekerjaan == null)
................. .
@else
<span class="font-weight-bold">{{ $penghuni->pekerjaan }} </span>.
@endif
