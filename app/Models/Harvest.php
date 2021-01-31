<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Harvest extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [

        'user_id',
        'count',
        'price',
        'status',

    ];
    protected $dates = [
        'deleted_at'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function user(){

        return $this->hasOne('App\Models\User');

    }
}
