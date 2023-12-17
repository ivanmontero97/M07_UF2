<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use App\Http\Controllers\ControllerP2;
use App\Http\Controllers\ControladorP3;
use App\Http\Controllers\ControlUsuaris_P4;
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

Route::get('/sign/signin/{iniciar}/{sesion}/{de}/{usuari}',[SignController::class, 'signIn']);

Route::get('/sign/signup/{creacion}/{usuario}/{nuevo}', [SignController::class, 'signUp']);

//Rutas que se han modificado para la Practica 4 sobre Models
Route::post('/login', [ControlUsuaris_P4::class, 'checkLogin']);
Route :: post('/crearUsuario',[ControlUsuaris_P4::class,'insertUsuari']);

Route::get('/error', [ControllerP2::class, 'checkError'])->name('errorAcces.index');
Route::get('/login', function(){
    return view('login');
})-> name('name_login');

Route::get('crearUsuario',function(){
    return view('crearUsuario');
})->name('name_crearUsuario');

// Route::post('/mostrarUsuario', [ControladorP3::class , 'userData']);
