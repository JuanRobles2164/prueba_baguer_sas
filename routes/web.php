<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/authentication', [LoginController::class, 'login'])->name('authentication');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('usuario', UsuarioController::class);
Route::resource('empleado', EmpleadoController::class);

Route::name('usuarios.')->group(function(){
    Route::controller(UsuarioController::class)->group(function(){
        Route::get('/usuario/{usuario}/eliminar', 'destroy')->name('destroy');
    });
});
