<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;

class ControlUsuaris_P4 extends Controller
{
    function checkLogin(){
        $email = request('email');
        $password = request('password');
        
        $usuario =  Usuari :: where ('email', $email ) -> first();

        if($usuario && $usuario->password === $password){
            switch ($usuario->rol) {
                case 'estudiant':
                    return view('mostrar.alumne') -> with('email',$email);// Redirigir al dashboard del alumno
                    break;
                case 'professor':
                    return view('mostrar.profesor') -> with('email',$email) ; // Redirigir al dashboard del profesor
                    break;
                case 'centre':
                    $profesores = Usuari::where('rol', 'professor')->get(['nom', 'email']);
                    return view('mostrar.centre') -> with('email',$email) 
                    -> with('profesores',$profesores);
                    break;
                default:
                    // Si el rol no es ninguno de los esperados, manejar el caso por defecto aquí
                    break;
            }
        } else {
            return to_route('errorAcces.index');
        }

    }

    function insertUsuari(){
        $usuari = new Usuari;
        $usuari->nom = request('name');
        $usuari->cognom = request('surname');
        $usuari->email = request('email');
        $usuari->password = request('password');
        $usuari->rol= request('rol');
        $usuari->Activo = request('active');

        $usuari->save();

        return view('mostrarUsuario');
    }

}
