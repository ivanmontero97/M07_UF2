<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerP2 extends Controller
{
    function checkEmail(){
        $email = request('email');
        $arrayEmail = array(
        'profesor@email.com',
        'alumne@email.com',
        'centre@email.com'
        );
        for($i =0; $i< count($arrayEmail);$i++){
            if($email == $arrayEmail[0]){
                return view('mostrar.profesor') -> with('email',$email) ;
            } else if ($email == $arrayEmail[1]){
                return view('mostrar.alumne') -> with('email',$email);
            } else if($email == $arrayEmail[2]){
                return view('mostrar.centre') -> with('email',$email);
            }
        } ;

    
    }

    function checkError(){
        return 'Error de acceso';
    }
}
