<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
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

