<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'duration',
        'nbreModule',
        'imageFormation',
        'aproposFormation',
        'imageApropos',
        'apprentissage1',
        'apprentissage2',
        'apprentissage3',
        'apprentissage4',
        'codeAccess'
    ];

    public function chapitres()
    {
        return $this->hasMany(Chapitre::class);
    }
}
