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


    function getLink($obj)
    {
        if ($obj->movie_id) {
            $slug = Movies::where('id', $obj->movie_id)->value('slug');
            if ($slug) {
                return route('front.movie', ['id' => $slug]);
            }
        }
        if ($obj->serie_id) {
            $slug = Series::where('id', $obj->serie_id)->value('slug');
            if ($slug) {
                return route('front.serie', ['id' => $slug]);
            }
        }
        if ($obj->documental_id) {
            $slug = Documentals::where('id', $obj->documental_id)->value('slug');
            if ($slug) {
                return route('front.sezonedDocumental', ['id' => $slug]);
            }
        }
        if ($obj->oneseriedocumentals_id) {
            $slug = OneSerieDocumentals::where('id', $obj->oneseriedocumentals_id)->value('slug');
            if ($slug) {
                return route('front.documental', ['id' => $slug]);
            }
        }
    }
}
