<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignController extends Controller
{
    function signIn($iniciar , $sesion , $de , $usuari){
        $signInVar =  $iniciar . " " . $sesion . " " . $de . " " . $usuari;
        return view('signIn')->with('signInVar',$signInVar);
    }
    function signUp($creacion , $usuario , $nuevo){
        $signUpVar =  $creacion . " " . $usuario . " " . $nuevo ;
    return view('signUp')->with('signUpVar',$signUpVar);
    }
}
