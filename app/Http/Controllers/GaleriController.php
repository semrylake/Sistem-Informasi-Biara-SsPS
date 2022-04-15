<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Http\Requests\UpdateGaleriRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerifoto = Galeri::all();
        $data = [
            'galerifoto' => $galerifoto,
        ];
        return view('view_admin.galeris.index', [
            "title" => "Galeri",
        ], $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGaleriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'foto' => 'required|image|file|max:3024',
        ]);
        $validate['user_id'] = Auth::user()->id;
        if ($request->file('foto')) {
            $validate['foto'] = $request->file('foto')->store('foto-galeri');
        }
        Galeri::create($validate);
        return redirect('/galeri')->with('psn', 'Gambar berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGaleriRequest  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGaleriRequest $request, Galeri $galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $gambar = Galeri::all()->where('id', $slug)->first();
        // File::delete('foto-galeri-kost/' . $gambar->foto);
        Storage::delete($gambar->foto);
        Galeri::destroy($slug);
        return redirect('/galeri')->with('del', 'Gambar berhasil dihapus.');
    }
}
