<?php

use App\Http\Controllers\admin\ActorsController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminProccessController;
use App\Http\Controllers\admin\AdversController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\CountriesController;
use App\Http\Controllers\admin\DirectorsController;
use App\Http\Controllers\admin\DocumentalsSeasons;
use App\Http\Controllers\admin\DocumentsController;
use App\Http\Controllers\admin\DocumentsEpisodesControllers;
use App\Http\Controllers\admin\HeaderSlidersController;
use App\Http\Controllers\admin\HomeCategoriesController;
use App\Http\Controllers\admin\MoviesController;
use App\Http\Controllers\admin\OneSerieDocumentalsController;
use App\Http\Controllers\admin\PagesPhotosController;
use App\Http\Controllers\admin\ScriptwriterController;
use App\Http\Controllers\admin\SeasonsController;
use App\Http\Controllers\admin\SeriesController;
use App\Http\Controllers\admin\SeriesEpisodesController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\UsersProcessController;
use App\Http\Controllers\admin\ViewsController;
use App\Http\Controllers\front\AccountController;
use App\Http\Controllers\front\DocumentalsController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\LastController;
use App\Http\Controllers\front\MessagesController;
use App\Http\Controllers\front\MovieDeatilController;
use App\Http\Controllers\front\MoviesController as FrontMoviesController;
use App\Http\Controllers\front\SearchController;
use App\Http\Controllers\front\SerieDetailsController;
use App\Http\Controllers\front\SeriesController as FrontSeriesController;
use App\Models\DocumentalsEpisodes;
use App\Models\OneSerieDocumentals;
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
Route::get('/admin/renewpassword', [AdminController::class, 'renewpassword'])->name('admin.renewpassword');
Route::post('/admin/check_renew_email', [AdminController::class, 'check_renew_email'])->name('admin.check_renew_email');
Route::get('/checkemailsucces', [HomeController::class, 'checkemailsucces'])->name('admin.checkemailsucces');
Route::get('/resetpasswordpage', [HomeController::class, 'resetpasswordpage'])->name('front.resetpasswordpage');
Route::post('/resetpassword', [HomeController::class, 'resetpassword'])->name('front.resetpassword');





Route::group(['middleware' => 'adminlogin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, "index"])->name("index");
    Route::resource('/categories', CategoriesController::class);

    Route::resource('/settings', SettingsController::class);
    Route::resource('/home-categories', HomeCategoriesController::class);
    Route::resource('/movies', MoviesController::class);
    Route::resource('/series', SeriesController::class);
    Route::resource('/admins', AdminProccessController::class);
    // Route::resource('/users', UsersProcessController::class);
    Route::get('/users', [UsersProcessController::class, 'index'])->name('users.index');
    Route::get('/users/ban/{id}', [UsersProcessController::class, 'ban'])->name('ban');
    Route::resource('/documentals', DocumentsController::class);



    Route::get('/documentals/seasons/{id}', [DocumentalsSeasons::class, 'index'])->name('documentals.documents');
    Route::get('/documentals/seasons/create/new_season/{id}', [DocumentalsSeasons::class, 'create'])->name('documentals.create.new');
    Route::post('/documentals/seasons/store/{id}', [DocumentalsSeasons::class, 'store'])->name('documentals.create.store');
    Route::post('/documentals/seasons/destroy/{id}', [DocumentalsSeasons::class, 'destroy'])->name('documentals.seasons.destroy');
    Route::get('/documentals/seasons/edit/{id}', [DocumentalsSeasons::class, 'edit'])->name('seasons.documentals.edit');
    Route::post('/documentals/seasons/update/{id}', [DocumentalsSeasons::class, 'update'])->name('seasons.documentals.update');




    Route::get('/documentals/seasons/episodes/{id}/{serie_id}', [DocumentsEpisodesControllers::class, 'index'])->name('seasons.documentalsEpisodes.index');
    Route::get('/documentals/seasons/episodes/create/{id}/{serie_id}', [DocumentsEpisodesControllers::class, 'create'])->name('seasons.documentalsEpisodes.create');
    Route::post('/documentals/seasons/episodes/create/{id}/{serie_id}', [DocumentsEpisodesControllers::class, 'store'])->name('seasons.documentalsEpisodes.store');
    Route::get('/documentals/seasons/episodes/edit/{id}/{serie_id}', [DocumentsEpisodesControllers::class, 'edit'])->name('seasons.documentalsEpisodes.edit');
    Route::post('/documentals/seasons/episodes/update/{id}/{serie_id}', [DocumentsEpisodesControllers::class, 'update'])->name('seasons.documentalsEpisodes.update');
    Route::post('/documentals/seasons/episodes/destroy/{id}', [DocumentsEpisodesControllers::class, 'destroy'])->name('seasons.documentalsEpisodes.destroy');


    Route::resource('/oneseriedocumentals', OneSerieDocumentalsController::class);


    Route::resource('/headersliders', HeaderSlidersController::class);

    Route::get('/search', [HeaderSlidersController::class, 'searchindex'])->name('headersliders.searchindex');
    Route::get('/searchresult', [HeaderSlidersController::class, 'search'])->name('headersliders.searchresult');
    Route::get('/headerslideradd/{id}/{type}', [HeaderSlidersController::class, 'headerslideradd'])->name('headersliders.headerslideradd');
    Route::post('/headersliderstore/{id}/{type}', [HeaderSlidersController::class, 'headersliderstore'])->name('headersliders.headersliderstore');


    Route::get('/changesliderimg/{id}', [HeaderSlidersController::class, 'changesliderimg'])->name('headersliders.changesliderimg');
    Route::post('/changesliderimgupdate/{id}', [HeaderSlidersController::class, 'changesliderimgupdate'])->name('headersliders.changesliderimgupdate');


    Route::post('/headersliderdelete/{id}', [HeaderSlidersController::class, 'headersliderdelete'])->name('headersliders.headersliderdelete');


    Route::resource('/pages_photos', PagesPhotosController::class);
    Route::resource('/advertaisment', AdversController::class);






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
    Route::get('/favorites', [HomeController::class, 'favorites'])->name('favorites');

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


    Route::get('/documentals', [DocumentalsController::class, 'documentals'])->name('documentals')->middleware('userlogin');
    Route::get('/documental/{id}', [DocumentalsController::class, 'documental'])->name('documental')->middleware('userlogin');
    Route::get('/sezonedDocumental/{id}', [DocumentalsController::class, 'sezonedDocumental'])->name('sezonedDocumental')->middleware('userlogin');



    Route::get('/last_uploads', [LastController::class, 'last_uploads'])->name('last_uploads')->middleware('userlogin');
    Route::get('/contact', [MessagesController::class, 'index'])->name('contact')->middleware('userlogin');
    Route::get('/search', [SearchController::class, 'index'])->name('search')->middleware('userlogin');
    Route::get('/movie/{id}', [MovieDeatilController::class, 'index'])->name('movie')->middleware('userlogin');
    Route::get('/serie/{id}', [SerieDetailsController::class, 'index'])->name('serie')->middleware('userlogin');
    Route::get('/get_serie/{id}', [SerieDetailsController::class, 'get_serie'])->name('get_serie')->middleware('userlogin');
    Route::get('/get_documentals/{id}', [DocumentalsController::class, 'get_documentals'])->name('get_documentals')->middleware('userlogin');






    Route::get('/add_cookie/{type}/{id}', [HomeController::class, 'add_cookie'])->name('add_cookie')->middleware('userlogin');
    Route::get('/remove_cookie/{type}/{id}', [HomeController::class, 'remove_cookie'])->name('remove_cookie')->middleware('userlogin');
});


Route::post('/sendmessages', [MessagesController::class, 'sendmessages'])->name('front.sendmessages');
