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
use App\Http\Controllers\ComunidadesAutonomaController;
use App\Http\Controllers\ProvinciaController;
use App\Models\ComunidadesAutonoma;
use App\Models\Provincia;

// use Fruitcake\Cors\CorsFacade as Cors;

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





Route::group(['middleware' => ['auth', 'permission']], function () {
    Route::group(['prefix' => 'backend', 'as' => 'backend.'], function () {
        Route::resource('garitos', GaritoController::class);
    });
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

Route::resource('comunidades_autonomas', ComunidadesAutonomaController::class);
Route::resource('provincias', ProvinciaController::class);
Route::get('/get-comunidad-autonoma/{provinciaId}', [ProvinciaController::class, 'getComunidadAutonoma']);
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
