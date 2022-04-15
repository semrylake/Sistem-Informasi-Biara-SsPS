<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pendidikan extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tingkat'
            ]
        ];
    }

    public function pendidikanWhereId($id)
    {
        return Pendidikan::where('penghuni_id', $id)->orderBy('id', 'asc')->get();
    }
    public function pendidikanWhereSlug($slug)
    {
        return Pendidikan::where('slug', $slug)->first();
    }
    public function updatePendidikan($slug, $mydata)
    {
        DB::table('pendidikans')->where('id', $slug)->update($mydata);
    }
}
