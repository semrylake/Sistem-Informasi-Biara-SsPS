<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visi extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'visi'
            ]
        ];
    }
    public function visiWhereSlug($slug)
    {
        return Visi::where('slug', $slug)->first();
    }
    public function updatevisi($slug, $mydata)
    {
        DB::table('visis')->where('id', $slug)->update($mydata);
    }
}
