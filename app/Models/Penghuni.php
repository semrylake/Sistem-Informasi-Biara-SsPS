<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penghuni extends Model
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
    protected $fillable = [
        'nama',
        'slug',
        'tpt_lahir',
        'paroki',
        'tgl_lahir',

        'tpt_baptis',
        'tgl_baptis',

        'pembaptis',

        'tgl_msk_biara',
        'biara_masuk_pertama',

        'no_pakaian',

        'masuki_novisiat_di',
        'tgl_masuk_novisiat',

        'tgl_filial',
        'komunitas_filial',

        'pekerjaan',
        'foto',
    ];

    public function datapenghuniWhere($slug)
    {
        return DB::table('penghunis')
            ->where('slug', $slug)
            ->first();
    }
    public function penghuniWhereId($id)
    {
        return DB::table('penghunis')
            ->where('id', $id)
            ->first();
    }
    public function updatepenghuni($slug, $mydata)
    {
        DB::table('penghunis')->where('id', $slug)->update($mydata);
    }
}
