<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{

    protected $fillable = ['formation_id', 'titre', 'description'];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
