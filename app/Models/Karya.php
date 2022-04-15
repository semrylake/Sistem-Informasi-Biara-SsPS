<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Karya extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'karya'
            ]
        ];
    }
    public function karyaWhereId($id)
    {
        return Karya::where('penghuni_id', $id)->orderBy('id', 'asc')->get();
    }
    public function karyaWhereSlug($slug)
    {
        return Karya::where('slug', $slug)->first();
    }
    public function updateKarya($slug, $mydata)
    {
        DB::table('karyas')->where('id', $slug)->update($mydata);
    }
}
