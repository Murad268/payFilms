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
