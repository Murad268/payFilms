<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SeriesEpisodes extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['slug', "episode_name"];
    protected $guarded = [];
    public $table = "series_episodes";
}
