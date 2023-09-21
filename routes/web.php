<?php

use App\Http\Controllers\admin\ActorsController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminProccessController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\CountriesController;
use App\Http\Controllers\admin\DirectorsController;
use App\Http\Controllers\admin\HomeCategoriesController;
use App\Http\Controllers\admin\MoviesController;
use App\Http\Controllers\admin\ScriptwriterController;
use App\Http\Controllers\admin\SeasonsController;
use App\Http\Controllers\admin\SeriesController;
use App\Http\Controllers\admin\SeriesEpisodesController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\front\AccountController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\LastController;
use App\Http\Controllers\front\MessagesController;
use App\Http\Controllers\front\MoviesController as FrontMoviesController;
use App\Http\Controllers\front\SeriesController as FrontSeriesController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/access_check', [AdminController::class, 'access_check'])->name('admin.access_check');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => 'adminlogin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, "index"])->name("index");
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/settings', SettingsController::class);
    Route::resource('/home-categories', HomeCategoriesController::class);
    Route::resource('/actors', ActorsController::class);
    Route::resource('/directors', DirectorsController::class);
    Route::resource('/scriptwriters', ScriptwriterController::class);
    Route::resource('/countries', CountriesController::class);
    Route::resource('/movies', MoviesController::class);
    Route::resource('/series', SeriesController::class);
    Route::resource('/admins', AdminProccessController::class);




    Route::get('/series/seasons/{id}', [SeasonsController::class, 'index'])->name('seasons.index');
    Route::get('/series/seasons/create/new_season/{id}', [SeasonsController::class, 'create'])->name('seasons.create.new');
    Route::post('/series/seasons/store/{id}', [SeasonsController::class, 'store'])->name('seasons.create.store');
    Route::post('/series/seasons/destroy/{id}', [SeasonsController::class, 'destroy'])->name('seasons.destroy');
    Route::get('/series/seasons/edit/{id}', [SeasonsController::class, 'edit'])->name('seasons.edit');
    Route::post('/series/seasons/update/{id}', [SeasonsController::class, 'update'])->name('seasons.update');
    Route::get('/series/seasons/episodes/{id}/{serie_id}', [SeriesEpisodesController::class, 'index'])->name('seasons.episodes.index');
    Route::get('/series/seasons/episodes/create/{id}/{serie_id}', [SeriesEpisodesController::class, 'create'])->name('seasons.episodes.create');
    Route::post('/series/seasons/episodes/create/{id}/{serie_id}', [SeriesEpisodesController::class, 'store'])->name('seasons.episodes.store');
    Route::get('/series/seasons/episodes/edit/{id}/{serie_id}', [SeriesEpisodesController::class, 'edit'])->name('seasons.episodes.edit');
    Route::post('/series/seasons/episodes/update/{id}/{serie_id}', [SeriesEpisodesController::class, 'update'])->name('seasons.episodes.update');
});





if (Cookie::has('email')) {
    Route::get('/', [HomeController::class, 'index'])->name('front.index')->middleware('userlogin');;
} else {
    Route::get('/', [HomeController::class, 'front'])->name('front.index');
}

Route::group(['prefix' => '', 'as' => 'front.'], function () {
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::get('/register', [HomeController::class, 'register'])->name('register');
    Route::get('/register_сheck', [HomeController::class, 'register_сheck'])->name('register_сheck');
    Route::get('/activation', [HomeController::class, 'activation'])->name('activation');
    Route::get('/login_check', [HomeController::class, 'login_check'])->name('login_check');
    Route::get('/account', [AccountController::class, 'index'])->name('account')->middleware('userlogin');
    Route::post('/account/update/{id}', [AccountController::class, 'update'])->name('account.update')->middleware('userlogin');
    Route::post('/account/check/{id}', [AccountController::class, 'check'])->name('account.check')->middleware('userlogin');
    Route::get('/account/logout', [AccountController::class, 'logout'])->name('account.logout')->middleware('userlogin');
    Route::get('/movies/{slug}', [FrontMoviesController::class, 'movies'])->name('movies')->middleware('userlogin');
    Route::get('/series', [FrontSeriesController::class, 'series'])->name('series')->middleware('userlogin');
    Route::get('/last_uploads', [LastController::class, 'last_uploads'])->name('last_uploads')->middleware('userlogin');
    Route::get('/contact', [MessagesController::class, 'index'])->name('contact')->middleware('userlogin');
});


Route::post('/sendmessages', [MessagesController::class, 'sendmessages'])->name('front.sendmessages');
