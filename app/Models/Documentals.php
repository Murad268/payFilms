<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Spatie\Translatable\HasTranslations;

class Documentals extends Model
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
        if (Cookie::has('email')) {
            $loginCookieValue = Cookie::get('email');
            $user = create_mainUsers::where('email', $loginCookieValue)->first();
            if ($user->isBlocked != 0 or $user->activationStatus != 1) {
                Cookie::queue(Cookie::make('email', "", -1));

                return redirect()->route('front.login');
            }
        }
        $favorite = Favorites::where('type', $type)->where('movie_id', $id)->where('user_id', $user->id)->get();
        if ($favorite->count() > 0) {
            return true;
        } else false;
    }
    public function serie_seasons()
    {
        return $this->hasMany(DocumentalsSeasons::class, 'serie_id');
    }
}
