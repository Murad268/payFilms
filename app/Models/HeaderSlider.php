<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderSlider extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function series()
    {
        return $this->hasMany(Series::class,  'id', 'serie_id');
    }

    public function movies()
    {
        return $this->hasMany(Movies::class, 'id', 'movie_id');
    }

    public function documentals()
    {
        return $this->hasMany(Documentals::class, 'id', 'documental_id');
    }

    public function onseseriedocumentals()
    {
        return $this->hasMany(OneSerieDocumentals::class, 'id', 'oneseriedocumentals_id');
    }


    function getName($obj)
    {
        if ($obj->movie_id != null) {
            return Movies::findOrFail($obj->movie_id)->desc;
        } else if ($obj->serie_id != null) {
            return Series::findOrFail($obj->serie_id)->desc;
        } else if ($obj->documental_id != null) {
            return Documentals::findOrFail($obj->documental_id)->desc;
        } else if ($obj->oneseriedocumentals_id != null) {
            return OneSerieDocumentals::findOrFail($obj->oneseriedocumentals_id)->desc;
        }
    }



    function getCategory($obj)
    {
        if ($obj->movie_id != null) {
            return Movies::findOrFail($obj->movie_id)->movie_categories->name;;
        } else if ($obj->serie_id != null) {
            return Series::findOrFail($obj->serie_id)->movie_categories->name;;
        } else if ($obj->documental_id != null) {
            return Documentals::findOrFail($obj->documental_id)->movie_categories->name;;
        } else if ($obj->oneseriedocumentals_id != null) {
            return OneSerieDocumentals::findOrFail($obj->oneseriedocumentals_id)->movie_categories->name;
        }
    }
}
