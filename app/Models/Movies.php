<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Movies extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name', 'slug', "actors", "directors", "scriptwriters", "desc", "countries"];
    protected $guarded = [];
    protected $charset = 'utf8mb4';
    protected $collation = 'utf8mb4_general_ci';

    public function movie_categories()
    {
        return $this->hasOne(Categories::class, 'id', 'movie_category_id');
    }


    public function movie_home_categories()
    {
        return $this->hasOne(HomeCategories::class, 'id', 'movie_home_category_id');
    }
}
