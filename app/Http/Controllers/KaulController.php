<?php

namespace App\Http\Controllers;

use App\Models\{Kaul, Penghuni};
// use App\Models\Penghuni;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class KaulController extends Controller
{

    public function __construct()
    {
        $this->Penghuni = new Penghuni();
        $this->Kaul = new Kaul();
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kaul::class, 'slug', $request->nama);
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
            'title' => 'Tambah Kaul',
            'slug' => $slug,
        ];
        return view('view_admin.kaul.tambah_kaul', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKaulRequest  $request
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
            'tgl_kaul' => 'required',
            'tpt_kaul' => 'required',
            'moto' => 'required',
        ], [
            'tgl_kaul.required' => 'Kolom ini harus diisi !!',
            'nama.required' => 'Kolom ini harus diisi !!',
            'tpt_kaul.required' => 'Kolom ini harus diisi !!',
            'moto.required' => 'Kolom ini harus diisi !!',
        ]);
        $validate['penghuni_id'] = $request->penghuni_id;
        Kaul::create($validate);
        return redirect('/tambah-kaul/' . $datapenghuni->slug)->with('psn', 'Data berhasil disimpan.');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kaul  $kaul
     * @return \Illuminate\Http\Response
     */
    public function show(Kaul $kaul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kaul  $kaul
     * @return \Illuminate\Http\Response
     */
    public function edit($kaul)
    {
        $datakaul = $this->Kaul->dataKaulFirst($kaul);
        // dd($datapenghuni);
        if (!$datakaul) {
            return abort('404');
        }
        $datapenghuni = $this->Penghuni->penghuniWhereId($datakaul->penghuni_id);
        $data = [
            'kaul' => $datakaul,
            'title' => 'Edit Kaul',
            'slug' => $datapenghuni->slug,
        ];
        return view('view_admin.kaul.edit_kaul', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKaulRequest  $request
     * @param  \App\Models\Kaul  $kaul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $datakaul = $this->Kaul->dataKaulFirst($slug);
        if (!$datakaul) {
            return abort('404');
        }
        $request->validate([
            'nama' => 'required',
            'slug' => 'required',
            'tgl_kaul' => 'required',
            'tpt_kaul' => 'required',
            'moto' => 'required',
        ], [
            'tgl_kaul.required' => 'Kolom ini harus diisi !!',
            'nama.required' => 'Kolom ini harus diisi !!',
            'tpt_kaul.required' => 'Kolom ini harus diisi !!',
            'moto.required' => 'Kolom ini harus diisi !!',
        ]);
        $mydata = [
            'nama' => $request->nama,
            'slug' => $request->slug,
            'tgl_kaul' => $request->tgl_kaul,
            'tpt_kaul' => $request->tpt_kaul,
            'moto' => $request->moto,
        ];
        $this->Kaul->updatekaul($datakaul->id, $mydata);
        return redirect('/edit-kaul/' . $request->slug)->with('update_msg', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kaul  $kaul
     * @return \Illuminate\Http\Response
     */
    public function destroy($kaul)
    {
        $datakaul = $this->Kaul->dataKaulFirst($kaul);
        if (!$datakaul) {
            return abort('404');
        }
        $datapenghuni = $this->Penghuni->penghuniWhereId($datakaul->penghuni_id);
        // dd($datapenghuni);
        Kaul::destroy($datakaul->id);
        return redirect('/detail-penghuni/' . $datapenghuni->slug)->with('del_msg', 'Data berhasil dihapus.');
    }
}
