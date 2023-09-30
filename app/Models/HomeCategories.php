<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
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







    public function documentals()
    {
        return $this->hasMany(Documentals::class, 'movie_home_category_id')->whereHas('serie_seasons.episodes')->where('status', 1);
    }








    public function series()
    {
        return $this->hasMany(Series::class, 'movie_home_category_id')->whereHas('serie_seasons.episodes')->where('status', 1);
    }


    public function oneseriedocumentals()
    {
        return $this->hasMany(OneSerieDocumentals::class, 'movie_home_category_id')->where('status', 1);
    }










    public function checkFavorite($type, $id) {
        if (Cookie::has('email')) {
            $loginCookieValue = Cookie::get('email');
            $user = create_mainUsers::where('email', $loginCookieValue)->first();
            if ($user->isBlocked != 0 or $user->activationStatus != 1) {
                Cookie::queue(Cookie::make('email', "", -1));

                return redirect()->route('front.login');
            }
        }
        $favorite = Favorites::where('type', $type)->where('movie_id', $id)->where('user_id', $user->id)->get();
        if($favorite->count() > 0) {
            return true;
        } else false;
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
