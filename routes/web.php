<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
<<<<<<< Updated upstream
=======

Route::resource('usuario', UsuarioController::class);
Route::resource('empleado', EmpleadoController::class);

Route::name('usuarios.')->group(function(){
    Route::controller(UsuarioController::class)->group(function(){
        Route::get('/usuario/{usuario}/eliminar', 'destroy')->name('destroy');
    });
});
>>>>>>> Stashed changes
