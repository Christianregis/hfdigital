<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conseil extends Model
{
    protected $fillable = [
        'title',
        'image',
        'shortDescription',
        'longDescription',
    ];
}
