<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photos extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'file',
        'url',

    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $hidden = [
        'deleted_at'
    ];
}
