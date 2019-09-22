<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mataem extends Model
{
    protected $table='mataem';

    protected $fillable = [
        'title', 'body',
    ];
}
