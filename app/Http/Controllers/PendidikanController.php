<?php

namespace App\Http\Controllers;

use App\Models\{Pendidikan, Penghuni};
use App\Http\Requests\StorePendidikanRequest;
use App\Http\Requests\UpdatePendidikanRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function __construct()
    {
        $this->Penghuni = new Penghuni();
        $this->Pendidikan = new Pendidikan();
    }
    public function checkSlug(Request $request)
    {
        // dd($request->all());
        $slug = SlugService::createSlug(Pendidikan::class, 'slug', $request->nama);
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
            'title' => 'Tambah Pendidikan Terakhir',
            'slug' => $slug,
        ];
        return view('view_admin.pendidikan.tambah_pendidikan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $datapenghuni = $this->Penghuni->penghuniWhereId($request->penghuni_id);
        if (!$datapenghuni) {
            return abort('404');
        }
        $validate = $request->validate([
            'tingkat' => 'required',
            'slug' => 'required',
            'tahun' => 'required',
            'tempat' => 'required',
        ], [
            'tingkat.required' => 'Kolom ini harus diisi !!',
            'tahun.required' => 'Kolom ini harus diisi !!',
            'tempat.required' => 'Kolom ini harus diisi !!',
        ]);
        $validate['penghuni_id'] = $request->penghuni_id;
        Pendidikan::create($validate);
        return redirect('/tambah-pendidikan/' . $datapenghuni->slug)->with('psn', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $datapendidikan = $this->Pendidikan->pendidikanWhereSlug($slug);

        if (!$datapendidikan) {
            return abort('404');
        }
        $datapenghuni = $this->Penghuni->penghuniWhereId($datapendidikan->penghuni_id);
        $data = [
            'pendidikan' => $datapendidikan,
            'penghuni' => $datapenghuni,
            'title' => 'Edit Pendidikan Terakhir',
            'slug' => $datapenghuni->slug,
        ];
        return view('view_admin.pendidikan.edit_pendidikan', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendidikanRequest  $request
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $datapendidikan = $this->Pendidikan->pendidikanWhereSlug($slug);
        if (!$datapendidikan) {
            return abort('404');
        }
        $request->validate([
            'tingkat' => 'required',
            'tahun' => 'required',
            'tempat' => 'required',
            'slug' => 'required',
        ], [
            'tingkat.required' => 'Kolom ini harus diisi !!',
            'tahun.required' => 'Kolom ini harus diisi !!',
            'tempat.required' => 'Kolom ini harus diisi !!',
            'slug.required' => 'Kolom ini harus diisi !!',
        ]);
        $mydata = [
            'tingkat' => $request->tingkat,
            'slug' => $request->slug,
            'tahun' => $request->tahun,
            'tempat' => $request->tempat,
        ];
        $this->Pendidikan->updatePendidikan($datapendidikan->id, $mydata);
        return redirect('/edit-pendidikan/' . $request->slug)->with('update_msg', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $datapendidikan = $this->Pendidikan->pendidikanWhereSlug($slug);
        if (!$datapendidikan) {
            return abort('404');
        }
        $datapenghuni = $this->Penghuni->penghuniWhereId($datapendidikan->penghuni_id);
        // dd($datapenghuni);
        Pendidikan::destroy($datapendidikan->id);
        return redirect('/detail-penghuni/' . $datapenghuni->slug)->with('del_msg', 'Data berhasil dihapus.');
    }
}
