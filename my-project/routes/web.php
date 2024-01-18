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


/*              ******* IMPORTANTE  *******
Por no volver a crear de nuevo la lógica de los controladores ya que los hice en practicas anteriores
 los dejare en sus respectivas rutas asociadas a sus controladores(uno por cada práctica) , no obstante , si tuviera que rehacer el proyecto
 desde 0 , los agruparía de una forma mas lógica y ordenada.*/

//Ruta Login -  sin controlador asociado
 Route::get('/login', function(){
    return view('login');
})-> name('name_login');
//Ruta Registrar Usuario - sin controlador asociado
Route::get('crearUsuario',function(){
    return view('crearUsuario');
})->name('name_crearUsuario');

//Practica 1 
// Route::controller(SignController::class)->group(function(){
//     Route::get('/sign/signin/{iniciar}/{sesion}/{de}/{usuari}', 'signIn') -> name('signIn');
//     Route::get('/sign/signup/{creacion}/{usuario}/{nuevo}', 'signUp') -> name('signUp');
// });


//Practica 2
Route::controller(ControllerP2::class)->group(function(){
    Route::get('/error', 'checkError') -> name('errorAcces.index');
});
//Practica 4 
Route::controller(ControlUsuaris_P4::class)->group(function(){
    Route::post('/login', 'checkLogin') -> name('validateSignIn') ->middleware('loginError'); //Se ha modificado el middleware expresamente para la P5
    Route::post('/crearUsuario', 'insertUsuari') -> name('postSignUp'); 
    //Crud Profesores
    Route::get('/editarProfesor/{id}','editarProfesor')->name('profesores.editar');
    Route::put('/profesor/{id}','updateProfesor')->name('profesores.update');
    Route::delete('/borrarProfesor/{id}','borrarProfesor')->name('profesores.borrar');
    //Crud Rol Profesores
    Route::get('/editarAlumno/{id}','editarAlumno')->name('alumnos.editar');
    Route::put('/alumno/{id}','updateAlumno')->name('alumnos.update');
    Route::delete('/borrarAlumno/{id}','borrarAlumno')->name('alumnos.borrar');
});
