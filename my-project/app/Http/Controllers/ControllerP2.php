<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerP2 extends Controller
{
    
    // function checkEmail(){
    //     $email = request('email');
    //     $arrayEmail = array(
    //     'profesor@email.com',
    //     'alumne@email.com',
    //     'centre@email.com'
    //     );
    //     $llistaProfesors = array("Oriol"=>"oriol@email.com",
    //     "Juanma"=>"juanma@email.com",
    //     "Roger"=>"roger@email.com"
    //     );

    //     for($i =0; $i< count($arrayEmail);$i++){
    //         if($email == $arrayEmail[0]){
    //             return view('mostrar.profesor') -> with('email',$email) ;
    //         } else if ($email == $arrayEmail[1]){
    //             return view('mostrar.alumne') -> with('email',$email);
    //         } else if($email == $arrayEmail[2]){
    //             return view('mostrar.centre') -> with('email',$email) 
    //             -> with('llistaProfesors',$llistaProfesors);
    //         }
    //     } ;

    
    // }
    
    //Se ha modificado esta función para la P5 para controlar las excepciones de inicio de sesión a través de middleware
    function checkError(){
        return view('Excepcion.errorSignIn');
    }
}
