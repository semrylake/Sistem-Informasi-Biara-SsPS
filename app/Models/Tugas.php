<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tugas extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tempat'
            ]
        ];
    }
    public function tugasWhere($slug)
    {
        return Tugas::where('penghuni_id', $slug)->orderBy('id', 'asc')->get();
    }
    public function tugasWhereSlug($slug)
    {
        return Tugas::where('slug', $slug)->first();
    }
    public function updatetugas($slug, $mydata)
    {
        DB::table('tugas')->where('id', $slug)->update($mydata);
    }
}
