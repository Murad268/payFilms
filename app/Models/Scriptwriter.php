<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Scriptwriter extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name', 'slug'];
    public $table = 'scriptwriters';
    protected $guarded = [];

    public function movies()
    {
        return $this->belongsToMany(Movies::class, 'movies_scriptwriters', 'scriptwriters_id', 'movie_id');
    }
}
