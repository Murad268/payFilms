<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DirectorModel extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name', 'slug'];
    public $table = 'director_models';
    protected $guarded = [];

    public function movies()
    {
        return $this->belongsToMany(Movies::class, 'movies_countries', 'director_id', 'movie_id');
    }
}
