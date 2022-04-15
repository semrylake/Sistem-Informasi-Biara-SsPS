<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Keluarga extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function keluargaWhereId($id)
    {
        return Keluarga::where('penghuni_id', $id)->orderBy('id', 'asc')->get();
    }
    public function keluargaWhereSlug($slug)
    {
        return Keluarga::where('slug', $slug)->first();
    }
    public function updateKeluarga($slug, $mydata)
    {
        DB::table('keluargas')->where('id', $slug)->update($mydata);
    }
}
