<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Misi extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'misi'
            ]
        ];
    }
    public function misiWhereSlug($slug)
    {
        return Misi::where('slug', $slug)->first();
    }
    public function updatemisi($slug, $mydata)
    {
        DB::table('misis')->where('id', $slug)->update($mydata);
    }
}
