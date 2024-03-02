<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\GaritoController;
use App\Http\Controllers\ConciertoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/provincias/list', [ProvinciaController::class, 'getProvinceList']);
Route::middleware([Illuminate\Http\Middleware\HandleCors::class])->group(function () {
    Route::post('/EnviarCorreo', [EmailController::class,'index']);
    //Web Noticias
    Route::get('/noticias/first-seven', [NoticiaController::class, 'firstSeven']);
    Route::get('/noticias/first-three', [NoticiaController::class, 'getFirstThree']);
    Route::get('/noticias/from-fourth', [NoticiaController::class, 'getFromFourthToEnd']);
    Route::get('/noticia/{id}', [NoticiaController::class, 'apiShow']);


    //Web Garitos
    Route::get('/garitos/random-seven', [GaritoController::class, 'getRandomSeven']);
    Route::get('/garitos/random-from-cities', [GaritoController::class, 'getRandomFromCities']);
    Route::get('/garitos/all-by-province', [GaritoController::class, 'getAllByProvince']);

    //Web Conciertos
    Route::get('/conciertos-first-ten-upcoming', [ConciertoController::class, 'getFirstTenUpcoming']);
    Route::get('/conciertos-last-week-updates', [ConciertoController::class, 'getLastWeekUpdates']);
    Route::get('/conciertos-all-from-today', [ConciertoController::class, 'getAllFromToday']);
});
