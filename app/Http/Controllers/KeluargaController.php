<?php

namespace App\Http\Controllers;

use App\Models\{Keluarga, Penghuni};
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function __construct()
    {
        $this->Penghuni = new Penghuni();
        $this->Keluarga = new Keluarga();
    }
    public function checkSlug(Request $request)
    {
        // dd($request->all());
        $slug = SlugService::createSlug(Keluarga::class, 'slug', $request->nama);

        return response()->json(['slug' => $slug]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $datapenghuni = $this->Penghuni->datapenghuniWhere($slug);
        if (!$datapenghuni) {
            return abort('404');
        }
        $data = [
            'penghuni' => $datapenghuni,
            'title' => 'Tambah Anggota Keluarga',
            'slug' => $slug,
        ];

        return view('view_admin.keluarga.tambah_keluarga', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKeluargaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datapenghuni = $this->Penghuni->penghuniWhereId($request->penghuni_id);
        if (!$datapenghuni) {
            return abort('404');
        }
        $validate = $request->validate([
            'nama' => 'required',
            'slug' => 'required',
            'jk' => 'required',
        ], [
            'nama.required' => 'Kolom ini harus diisi !!',
            'jk.required' => 'Kolom ini harus diisi !!',
        ]);
        $validate['penghuni_id'] = $request->penghuni_id;
        $validate['status'] = $request->status;
        $validate['tpt_lahir'] = $request->tpt_lahir;
        $validate['tgl_lahir'] = $request->tgl_lahir;
        $validate['tgl_meninggal'] = $request->tgl_meninggal;
        $validate['tlpn'] = $request->tlpn;
        $validate['alamat'] = $request->alamat;
        Keluarga::create($validate);
        return redirect('/tambah-keluarga/' . $datapenghuni->slug)->with('psn', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Keluarga $keluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $datakeluarga = $this->Keluarga->keluargaWhereSlug($slug);

        if (!$datakeluarga) {
            return abort('404');
        }
        $datapenghuni = $this->Penghuni->penghuniWhereId($datakeluarga->penghuni_id);
        $data = [
            'keluarga' => $datakeluarga,
            'penghuni' => $datapenghuni,
            'title' => 'Edit Data Keluarga',
            'slug' => $datapenghuni->slug,
        ];
        return view('view_admin.keluarga.edit_keluarga', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKeluargaRequest  $request
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $datakeluarga = $this->Keluarga->keluargaWhereSlug($slug);
        if (!$datakeluarga) {
            return abort('404');
        }
        // dd($slug);
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'slug' => 'required',
        ], [
            'nama.required' => 'Kolom ini harus diisi !!',
            'jk.required' => 'Kolom ini harus diisi !!',
        ]);
        $mydata = [
            'nama' => $request->nama,
            'slug' => $request->slug,
            'jk' => $request->jk,
            'status' => $request->status,
            'tpt_lahir' => $request->tpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'tgl_meninggal' => $request->tgl_meninggal,
            'tlpn' => $request->tlpn,
            'alamat' => $request->alamat,
        ];
        $this->Keluarga->updateKeluarga($datakeluarga->id, $mydata);
        return redirect('/edit-keluarga/' . $request->slug)->with('update_msg', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $datakeluarga = $this->Keluarga->keluargaWhereSlug($slug);
        if (!$datakeluarga) {
            return abort('404');
        }
        $datapenghuni = $this->Penghuni->penghuniWhereId($datakeluarga->penghuni_id);
        // dd($datapenghuni);
        Keluarga::destroy($datakeluarga->id);
        return redirect('/detail-penghuni/' . $datapenghuni->slug)->with('del_msg', 'Data keluarga berhasil dihapus.');
    }
}
