<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function movies()
    {
        return $this->hasMany(Movies::class, 'id', 'movie_id');
    }


    public function series()
    {
        return $this->hasMany(Series::class, 'id', 'serie_id');
    }

    public function documentals()
    {
        return $this->hasMany(Documentals::class, 'id', 'documental_id');
    }


    public function oneseriesdocumentals()
    {
        return $this->hasMany(OneSerieDocumentals::class, 'id', 'oneseriesdocumentals_id');
    }
}
