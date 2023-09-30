<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;



class DocumentalsSeasons extends Model
{
    use HasFactory;
    use HasFactory;
    use HasTranslations;
    public $translatable = ['season_name', 'slug'];
    protected $guarded = [];


    public function episodes()
    {
        return $this->hasMany(DocumentalsEpisodes::class, 'season_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($movies) {
            $movies->episodes()->delete();
        });
    }
}
