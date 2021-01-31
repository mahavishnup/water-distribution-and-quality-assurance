<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tracking extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [

        'from',
        'current',
        'to',

    ];
    protected $dates = [
        'deleted_at'
    ];

    protected $hidden = [
        'deleted_at'
    ];
}
