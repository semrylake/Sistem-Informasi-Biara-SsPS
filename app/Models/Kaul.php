<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kaul extends Model
{
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
    protected $guarded = ['id'];

    public function kaulWhere($slug)
    {
        // dd(Kaul::all()->where('penghuni_id', $slug));
        return Kaul::where('penghuni_id', $slug)->orderBy('id', 'asc')->get();
    }
    public function dataKaulFirst($slug)
    {
        // dd(Kaul::all()->where('penghuni_id', $slug));
        return Kaul::where('slug', $slug)->first();
    }
    public function kaulWhereId($id)
    {
        // dd(Kaul::all()->where('penghuni_id', $slug));
        return Kaul::where('id', $id)->first();
    }
    public function updatekaul($slug, $mydata)
    {
        DB::table('kauls')->where('id', $slug)->update($mydata);
    }
}
