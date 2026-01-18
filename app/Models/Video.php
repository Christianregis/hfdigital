<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $fillable = ['chapitre_id', 'titre', 'url'];

    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class);
    }
}
