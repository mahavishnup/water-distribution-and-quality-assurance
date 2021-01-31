<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class service extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [

        'tanker',
        'harvest',

    ];
    protected $dates = [
        'deleted_at'
    ];

    protected $hidden = [
        'deleted_at'
    ];
}
