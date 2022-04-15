<?php

namespace App\Http\Controllers;

use App\Models\{Misi, Penghuni};
use App\Http\Requests\StoreMisiRequest;
use App\Http\Requests\UpdateMisiRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MisiController extends Controller
{
    public function __construct()
    {
        $this->Penghuni = new Penghuni();
        $this->Misi = new Misi();
    }
    public function checkSlug(Request $request)
    {
        // dd($request->all());
        $slug = SlugService::createSlug(Misi::class, 'slug', $request->nama);

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
    public function create()
    {
        $data = [
            'title' => 'Tambah Misi',
        ];
        return view('view_admin.visi_misi.visi.tambah_misi', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMisiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'misi' => 'required',
            'slug' => 'required',
        ], [
            'misi.required' => 'Kolom ini harus diisi !!',
        ]);
        $validate['user_id'] = Auth::user()->id;
        Misi::create($validate);
        return redirect('/tambah-misi')->with('psn', 'Data misi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Misi  $misi
     * @return \Illuminate\Http\Response
     */
    public function show(Misi $misi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Misi  $misi
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $misi = $this->Misi->misiWhereSlug($slug);

        if (!$misi) {
            return abort('404');
        }
        $data = [
            'title' => 'Edit Misi',
            'misi' => $misi,
        ];
        return view('view_admin.visi_misi.visi.edit_misi', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMisiRequest  $request
     * @param  \App\Models\Misi  $misi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $misi = $this->Misi->misiWhereSlug($slug);

        if (!$misi) {
            return abort('404');
        }

        $request->validate([
            'misi' => 'required',
            'slug' => 'required',
        ], [
            'misi.required' => 'Kolom ini harus diisi !!',
        ]);
        $mydata = [
            'misi' => $request->misi,
            'slug' => $request->slug,
        ];
        $this->Misi->updatemisi($misi->id, $mydata);
        return redirect('/visi-misi')->with('update_msg', 'Data misi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Misi  $misi
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $misi = $this->Misi->misiWhereSlug($slug);
        if (!$misi) {
            return abort('404');
        }
        Misi::destroy($misi->id);
        return redirect('/visi-misi')->with('del_msg', 'Misi berhasil dihapus.');
    }
}
