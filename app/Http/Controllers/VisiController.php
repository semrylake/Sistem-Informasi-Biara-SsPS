<?php

namespace App\Http\Controllers;

use App\Models\{Visi, Penghuni};
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisiController extends Controller
{
    public function __construct()
    {
        $this->Penghuni = new Penghuni();
        $this->Visi = new Visi();
    }
    public function checkSlug(Request $request)
    {
        // dd($request->all());
        $slug = SlugService::createSlug(Visi::class, 'slug', $request->nama);

        return response()->json(['slug' => $slug]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visi = DB::table('visis')->get();
        $misi = DB::table('misis')->get();
        $visib = DB::table('visis')->first();

        $data = [
            'visi' => $visi,
            'misi' => $misi,
            'visis' => $visib,
            'title' => 'Visi & Misi',
            // 'slug' => $slug,
        ];

        return view('view_admin.visi_misi.visi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Visi',
            // 'slug' => $slug,
        ];
        return view('view_admin.visi_misi.visi.tambah_visi', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVisiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'visi' => 'required',
            'slug' => 'required',
        ], [
            'visi.required' => 'Kolom ini harus diisi !!',
        ]);
        $validate['user_id'] = Auth::user()->id;
        Visi::create($validate);
        return redirect('/visi-misi')->with('psn', 'Data visi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visi  $visi
     * @return \Illuminate\Http\Response
     */
    public function show(Visi $visi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visi  $visi
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $visi = $this->Visi->visiWhereSlug($slug);

        if (!$visi) {
            return abort('404');
        }
        $data = [
            'title' => 'Edit Visi',
            'visi' => $visi,
        ];
        return view('view_admin.visi_misi.visi.edit_visi', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVisiRequest  $request
     * @param  \App\Models\Visi  $visi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // dd($request->all());
        $visi = $this->Visi->visiWhereSlug($slug);

        if (!$visi) {
            return abort('404');
        }

        $request->validate([
            'visi' => 'required',
            'slug' => 'required',
        ], [
            'visi.required' => 'Kolom ini harus diisi !!',
        ]);
        $mydata = [
            'visi' => $request->visi,
            'slug' => $request->slug,
        ];
        $this->Visi->updatevisi($visi->id, $mydata);
        return redirect('/visi-misi')->with('update_msg', 'Data visi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visi  $visi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visi $visi)
    {
        //
    }
}
