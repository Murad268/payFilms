<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HomeCategories extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['cat_name', 'slug'];
    public $table = 'home_categories';
    protected $guarded = [];


    public function movies()
    {
        return $this->hasMany(Movies::class, 'movie_home_category_id')->where('status', 1);
    }





    public function series()
    {
        return $this->hasMany(Series::class, 'movie_home_category_id')->where('status', 1);;
    }

    public function documentals()
    {
        return $this->hasMany(Documentals::class, 'movie_home_category_id')->where('status', 1);;
    }

    public function oneseriedocumentals()
    {
        return $this->hasMany(OneSerieDocumentals::class, 'movie_home_category_id')->where('status', 1);;
    }



    public static function boot()
    {
        parent::boot();

        static::deleting(function ($movies) {
            $movies->movies()->delete();
            $movies->seires()->delete();
        });
    }
}
