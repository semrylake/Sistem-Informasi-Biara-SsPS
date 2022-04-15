<?php

namespace App\Http\Controllers;

use App\Models\{Tugas, Penghuni};
use App\Http\Requests\StoreTugasRequest;
use App\Http\Requests\UpdateTugasRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function __construct()
    {
        $this->Penghuni = new Penghuni();
        $this->Tugas = new Tugas();
    }
    public function checkSlug(Request $request)
    {
        // dd($request->all());
        $slug = SlugService::createSlug(Tugas::class, 'slug', $request->tempat);
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
            'title' => 'Tambah Tugas',
            'slug' => $slug,
        ];
        return view('view_admin.tugas.tambah_tugas', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTugasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datapenghuni = $this->Penghuni->penghuniWhereId($request->penghuni_id);
        if (!$datapenghuni) {
            return abort('404');
        }
        $validate = $request->validate([
            'tempat' => 'required',
            'slug' => 'required',
            'tahun' => 'required',
            'tugas' => 'required',
        ], [
            'tempat.required' => 'Kolom ini harus diisi !!',
            'tahun.required' => 'Kolom ini harus diisi !!',
            'tugas.required' => 'Kolom ini harus diisi !!',
        ]);
        $validate['penghuni_id'] = $request->penghuni_id;
        Tugas::create($validate);
        return redirect('/tambah-tugas/' . $datapenghuni->slug)->with('psn', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $datatugas = $this->Tugas->tugasWhereSlug($slug);

        if (!$datatugas) {
            return abort('404');
        }
        $datapenghuni = $this->Penghuni->penghuniWhereId($datatugas->penghuni_id);
        // dd($datapenghuni);
        $data = [
            'tugas' => $datatugas,
            'penghuni' => $datapenghuni,
            'title' => 'Edit Tugas',
            'slug' => $datapenghuni->slug,
        ];
        return view('view_admin.tugas.edit_tugas', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTugasRequest  $request
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $datatugas = $this->Tugas->tugasWhereSlug($slug);
        if (!$datatugas) {
            return abort('404');
        }
        $request->validate([
            'tempat' => 'required',
            'tahun' => 'required',
            'tugas' => 'required',
            'slug' => 'required',
        ], [
            'tempat.required' => 'Kolom ini harus diisi !!',
            'tahun.required' => 'Kolom ini harus diisi !!',
            'tugas.required' => 'Kolom ini harus diisi !!',
            'slug.required' => 'Kolom ini harus diisi !!',
        ]);
        $mydata = [
            'tempat' => $request->tempat,
            'slug' => $request->slug,
            'tahun' => $request->tahun,
            'tugas' => $request->tugas,
        ];
        $this->Tugas->updatetugas($datatugas->id, $mydata);
        return redirect('/edit-tugas/' . $request->slug)->with('update_msg', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($tugas)
    {
        $datatugas = $this->Tugas->tugasWhereSlug($tugas);
        if (!$datatugas) {
            return abort('404');
        }
        $datapenghuni = $this->Penghuni->penghuniWhereId($datatugas->penghuni_id);
        // dd($datapenghuni);
        Tugas::destroy($datatugas->id);
        return redirect('/detail-penghuni/' . $datapenghuni->slug)->with('del_msg', 'Data berhasil dihapus.');
    }
}
