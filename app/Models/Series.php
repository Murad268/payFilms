<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Series extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name', 'slug', "actors", "directors", "scriptwriters", "desc", "countries"];
    protected $guarded = [];

    public function movie_categories()
    {
        return $this->hasOne(Categories::class, 'id', 'movie_category_id');
    }


    public function movie_home_categories()
    {
        return $this->hasOne(HomeCategories::class, 'id', 'movie_home_category_id');
    }
    public function checkFavorite($type, $id)
    {
        $favorite = Favorites::where('type', $type)->where('movie_id', $id)->get();
        if ($favorite->count() > 0) {
            return true;
        } else false;
    }

    public function serie_seasons()
    {
        return $this->hasMany(Seasons::class, 'serie_id');
    }
}
