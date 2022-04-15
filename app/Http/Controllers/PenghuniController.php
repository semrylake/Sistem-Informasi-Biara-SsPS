<?php

namespace App\Http\Controllers;

use App\Models\{Karya, Penghuni, Kaul, Keluarga, Pendidikan, Tugas};
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenghuniController extends Controller
{
    public function __construct()
    {
        $this->Penghuni = new Penghuni();
        $this->Kaul = new Kaul();
        $this->Tugas = new Tugas();
        $this->Pendidikan = new Pendidikan();
        $this->Karya = new Karya();
        $this->Keluarga = new Keluarga();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penghuni = Penghuni::all();
        return view('view_admin.penghuni.index', [
            'title' => 'Penghuni',
            'penghuni' => $penghuni,
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Penghuni::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('view_admin.penghuni.tambah_penghuni', [
            'title' => 'Tambah Penghuni',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenghuniRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'nama' => 'required',
            'slug' => 'required',
            'foto' => 'image|file|max:1024',
        ], [
            'nama.required' => 'Kolom ini harus diisi !!',
        ]);
        $validate['tpt_lahir'] = $request->tpt_lahir;
        $validate['tpt_baptis'] = $request->tpt_baptis;
        $validate['pembaptis'] = $request->pembaptis;
        $validate['paroki'] = $request->paroki;
        $validate['biara_masuk_pertama'] = $request->biara_masuk_pertama;
        $validate['no_pakaian'] = $request->no_pakaian;
        $validate['masuki_novisiat_di'] = $request->masuki_novisiat_di;
        $validate['tgl_filial'] = $request->tgl_filial;
        $validate['komunitas_filial'] = $request->komunitas_filial;
        $validate['pekerjaan'] = $request->pekerjaan;
        // dd($request->all());

        if ($request->file('foto')) {
            $validate['foto'] = $request->file('foto')->store('foto-penghuni');
        }
        Penghuni::create($validate);
        return redirect('/tambah-penghuni')->with('psn', 'Data berhasil disimpan.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penghuni  $penghuni
     * @return \Illuminate\Http\Response
     */
    public function show(Penghuni $penghuni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penghuni  $penghuni
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $datapenghuni = $this->Penghuni->datapenghuniWhere($slug);
        if (!$datapenghuni) {
            return abort('404');
        }
        // dd($datapenghuni);
        $data = [
            'penghuni' => $datapenghuni,
            'title' => 'Edit Penghuni',
            'slug' => $datapenghuni->slug,
        ];
        return view('view_admin.penghuni.edit_penghuni', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenghuniRequest  $request
     * @param  \App\Models\Penghuni  $penghuni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $datapenghuni = $this->Penghuni->datapenghuniWhere($slug);
        if (!$datapenghuni) {
            return abort('404');
        }

        $request->validate([
            'nama' => 'required',
            'slug' => 'required',
            'foto' => 'image|file|max:1024',
        ], [
            'nama.required' => 'Kolom ini harus diisi !!',
        ]);


        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('foto-penghuni');
            Storage::delete($datapenghuni->foto);
        } else {
            $foto = $datapenghuni->foto;
        }

        $mydata = [
            'nama' => $request->nama,
            'paroki' => $request->paroki,
            'slug' => $request->slug,
            'tgl_lahir' => $request->tgl_lahir,
            'tgl_baptis' => $request->tgl_baptis,
            'tgl_msk_biara' => $request->tgl_msk_biara,
            'tgl_masuk_novisiat' => $request->tgl_masuk_novisiat,
            'tpt_lahir' => $request->tpt_lahir,
            'tpt_baptis' => $request->tpt_baptis,
            'pembaptis' => $request->pembaptis,
            'biara_masuk_pertama' => $request->biara_masuk_pertama,
            'no_pakaian' => $request->no_pakaian,
            'masuki_novisiat_di' => $request->masuki_novisiat_di,
            'tgl_filial' => $request->tgl_filial,
            'komunitas_filial' => $request->komunitas_filial,
            'pekerjaan' => $request->pekerjaan,
            'foto' => $foto,
        ];
        $this->Penghuni->updatepenghuni($datapenghuni->id, $mydata);
        return redirect('/edit-penghuni/' . $request->slug)->with('update_msg', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penghuni  $penghuni
     * @return \Illuminate\Http\Response
     */
    public function destroy($penghuni)
    {
        $datapenghuni = $this->Penghuni->datapenghuniWhere($penghuni);
        if (!$datapenghuni) {
            return abort('404');
        }
        Storage::delete($datapenghuni->foto);
        Penghuni::destroy($datapenghuni->id);
        return redirect('/penghuni')->with('del_msg', 'Data berhasil dihapus.');
    }

    public function detail($slug)
    {
        $datapenghuni = $this->Penghuni->datapenghuniWhere($slug);
        if (!$datapenghuni) {
            return abort('404');
        }
        $kaul = $this->Kaul->kaulWhere($datapenghuni->id);
        $tugas = $this->Tugas->tugasWhere($datapenghuni->id);
        $pendidikan = $this->Pendidikan->pendidikanWhereId($datapenghuni->id);
        $karya = $this->Karya->karyaWhereId($datapenghuni->id);
        $keluarga = Keluarga::all()->where('penghuni_id', $datapenghuni->id);
        // dd($keluarga);
        $data = [
            'penghuni' => $datapenghuni,
            'kaul' => $kaul,
            'tugas' => $tugas,
            'pendidikan' => $pendidikan,
            'karya' => $karya,
            'keluarga' => $keluarga,
            'title' => 'Detail Penghuni',
            'slug' => $datapenghuni->slug,
        ];
        return view('view_admin.penghuni.detail_penghuni', $data);
    }
}
