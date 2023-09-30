<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Seasons extends Model
{
    use HasFactory;
    use HasTranslations;
    public $table = "seasons";
    public $translatable = ['season_name', 'slug'];
    protected $guarded = [];


    public function episodes() {
        return $this->hasMany(SeriesEpisodes::class, 'season_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($movies) {
            $movies->episodes()->delete();
        });
    }
}
