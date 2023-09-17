<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Actors extends Model
{
    use HasFactory;
    use HasTranslations;
    public $table = 'actors';
    public $translatable = ['name', 'slug'];

    protected $guarded = [];

    public function movies()
    {
        return $this->belongsToMany(Movies::class, 'movies_actors', 'actor_id', 'movie_id');
    }
}
