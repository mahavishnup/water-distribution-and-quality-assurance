<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quality extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers, SoftDeletes;

    protected $fillable = [

        'title',
        'slug',
        'body',

    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $dates = [
        'deleted_at'
    ];

    protected $hidden = [
        'deleted_at'
    ];
}
