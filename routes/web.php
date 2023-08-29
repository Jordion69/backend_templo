<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GaritoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ConciertoController;
use App\Http\Controllers\TeloneroController;
use App\Http\Controllers\EmailController;
use Fruitcake\Cors\CorsFacade as Cors;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::post('/EnviarCorreo', [EmailController::class,'index']);

//Web Noticias
Route::get('/noticias/first-seven', [NoticiaController::class, 'getFirstSeven']);
Route::get('/noticias/first-three', [NoticiaController::class, 'getFirstThree']);
Route::get('/noticias/from-fourth', [NoticiaController::class, 'getFromFourthToEnd']);

//Web Garitos
Route::get('/garitos/random-seven', [GaritoController::class, 'getRandomSeven']);
Route::get('/garitos/random-from-cities', [GaritoController::class, 'getRandomFromCities']);
Route::get('/garitos/all-by-province', [GaritoController::class, 'getAllByProvince']);

//Web Conciertos
Route::get('/conciertos-first-ten-upcoming', [ConciertoController::class, 'getFirstTenUpcoming']);
Route::get('/conciertos-last-week-updates', [ConciertoController::class, 'getLastWeekUpdates']);
Route::get('/conciertos-all-from-today', [ConciertoController::class, 'getAllFromToday']);

Route::middleware([Cors::class])->group(function () {
    Route::post('/EnviarCorreo', [EmailController::class,'index']);
});

Route::group(['middleware' => ['auth', 'permission']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('garitos', GaritoController::class);
    Route::resource('noticias', NoticiaController::class);
    Route::resource('conciertos', ConciertoController::class);
    Route::resource('teloneros', TeloneroController::class);
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::resource('permissions', PermissionsController::class);
        Route::resource('roles', RolesController::class);
    });
    Route::resource('users', UsersController::class);
});
