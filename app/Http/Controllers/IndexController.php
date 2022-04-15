<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Misi;
use App\Models\Visi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $galeri = Galeri::limit(6)->get();
        $visi = Visi::first();
        $misi = Misi::all();
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');

        $data = [
            'today' => $today,
            'galeri' => $galeri,
            'visi' => $visi,
            'misi' => $misi,
            'judul' => 'Home',

        ];
        return view('view_index.index2', $data);
    }

    public function sejarah()
    {
        $data = [
            'judul' => 'Sejarah',

        ];
        return view('view_index.sejarah', $data);
    }
    public function about()
    {
        $data = [
            'judul' => 'About',

        ];
        return view('view_index.about', $data);
    }
    public function galeri()
    {
        $foto = Galeri::latest()->get();
        $data = [
            'judul' => 'Galeri',
            'foto' => $foto,
        ];
        return view('view_index.foto', $data);
    }
}
