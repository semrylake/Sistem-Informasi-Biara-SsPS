<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Penghuni;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class KaryaController extends Controller
{
    public function __construct()
    {
        $this->Penghuni = new Penghuni();
        $this->Karya = new Karya();
    }
    public function checkSlug(Request $request)
    {
        // dd($request->all());
        $slug = SlugService::createSlug(Karya::class, 'slug', $request->nama);

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
            'title' => 'Tambah Karya / Kursus',
            'slug' => $slug,
        ];

        return view('view_admin.karya.tambah_karya', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKaryaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datapenghuni = $this->Penghuni->penghuniWhereId($request->penghuni_id);
        if (!$datapenghuni) {
            return abort('404');
        }
        $validate = $request->validate([
            'karya' => 'required',
            'slug' => 'required',
            'tahun' => 'required',
            'tempat' => 'required',
        ], [
            'karya.required' => 'Kolom ini harus diisi !!',
            'tahun.required' => 'Kolom ini harus diisi !!',
            'tempat.required' => 'Kolom ini harus diisi !!',
        ]);
        $validate['penghuni_id'] = $request->penghuni_id;
        Karya::create($validate);
        return redirect('/tambah-karya/' . $datapenghuni->slug)->with('psn', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function show(Karya $karya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $datakarya = $this->Karya->karyaWhereSlug($slug);

        if (!$datakarya) {
            return abort('404');
        }
        $datapenghuni = $this->Penghuni->penghuniWhereId($datakarya->penghuni_id);
        $data = [
            'karya' => $datakarya,
            'penghuni' => $datapenghuni,
            'title' => 'Edit Karya / Kursus',
            'slug' => $datapenghuni->slug,
        ];
        return view('view_admin.karya.edit_karya', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKaryaRequest  $request
     * @param  \App\Models\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $datakarya = $this->Karya->karyaWhereSlug($slug);
        if (!$datakarya) {
            return abort('404');
        }
        // dd($datakarya);
        $request->validate([
            'karya' => 'required',
            'tahun' => 'required',
            'tempat' => 'required',
            'slug' => 'required',
        ], [
            'karya.required' => 'Kolom ini harus diisi !!',
            'tahun.required' => 'Kolom ini harus diisi !!',
            'tempat.required' => 'Kolom ini harus diisi !!',
            'slug.required' => 'Kolom ini harus diisi !!',
        ]);
        $mydata = [
            'karya' => $request->karya,
            'slug' => $request->slug,
            'tahun' => $request->tahun,
            'tempat' => $request->tempat,
        ];
        $this->Karya->updateKarya($datakarya->id, $mydata);
        return redirect('/edit-karya/' . $request->slug)->with('update_msg', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $datakarya = $this->Karya->KaryaWhereSlug($slug);
        if (!$datakarya) {
            return abort('404');
        }
        $datapenghuni = $this->Penghuni->penghuniWhereId($datakarya->penghuni_id);
        // dd($datapenghuni);
        Karya::destroy($datakarya->id);
        return redirect('/detail-penghuni/' . $datapenghuni->slug)->with('del_msg', 'Data berhasil dihapus.');
    }
}
