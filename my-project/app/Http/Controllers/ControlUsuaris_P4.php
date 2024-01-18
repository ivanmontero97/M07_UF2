<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;

class ControlUsuaris_P4 extends Controller
{
    //Esta función comprueba 
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
                    $alumnado = Usuari::where('rol', 'estudiant')->get();
                    return view('mostrar.profesor') -> with('alumnado',$alumnado);
                    break;
                case 'centre':
                    $profesores = Usuari::where('rol', 'professor')->get();
                    return view('mostrar.centre') -> with('profesores', $profesores);
                    break;
                default:
                    return to_route('errorAcces.index');
                    break;
            }
        }  else {
             return to_route('errorAcces.index');
         }

    }

    /*Esta función hace la operacion Create del CRUD pedido. Además antes de hacer un save en la BD comprueba
    y valida los campos antes de ser enviados , en caso , de que esten los campos vacíos o con un formato incorrecto
    la solicitud no se tramitará y se deberán volver a rellenar los datos */
    function insertUsuari(Request $request){
        
    // Validar la solicitud antes de continuar
    $request->validate([
        'name' => 'required',
        'surname' => 'required',
        'email' => 'required', // Asegura que el email sea único en la tabla 'usuaris' y que tenga un formato correcto
        'password' => 'required',
        'rol' => 'required',
        'active' => 'required',
    ]);

    // Crear una instancia de Usuari y asignar los valores
    $usuari = new Usuari;
    $usuari->nom = $request->input('name');
    $usuari->cognom = $request->input('surname');
    $usuari->email = $request->input('email');
    $usuari->password = $request->input('password');
    $usuari->rol = $request->input('rol');
    $usuari->Activo = $request->input('active');

    // Guardar el modelo en la base de datos
    $usuari->save();

    // Redirigir a la vista 'mostrarUsuario'
    return view('mostrarUsuario');
    }

    //Función que se encarga de encontrar el usuario de la BD con el ID(PK) 
    function editarAlumno($id){  
        $usuario = Usuari::find($id);
        return View('CRUD.editarAlumno')->with("alumn",$usuario); 
    }
    function editarProfesor($id){  
        $usuario = Usuari::find($id);
        return View('CRUD.editarProfesor')->with("prof",$usuario); 
    }

    //Función para guardar en la BD los datos modificados del usuario en cuestión a través del formulario de la vista de edición
    function updateAlumno(Request $request, $id){
        //Para ahorrarse excepciones
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required', // Asegura que el email sea único en la tabla 'usuaris' y que tenga un formato correcto
            'password' => 'required',
            'rol' => 'required',
            'active' => 'required',
        ]);

        $usuario = Usuari::find($id);
        $usuario->nom = $request->input('name');
        $usuario->cognom = $request->input('surname');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->rol = $request->input('rol');
        $usuario->Activo = $request->input('active');
        $usuario->save();
        
        $alumnado = Usuari::where('rol', 'estudiant')->get();
        return View('mostrar.profesor')->  with('alumnado', $alumnado);
    }
    function updateProfesor(Request $request, $id){
        //Para ahorrarse excepciones
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required', // Asegura que el email sea único en la tabla 'usuaris' y que tenga un formato correcto
            'password' => 'required',
            'rol' => 'required',
            'active' => 'required',
        ]);

        $usuario = Usuari::find($id);
        $usuario->nom = $request->input('name');
        $usuario->cognom = $request->input('surname');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->rol = $request->input('rol');
        $usuario->Activo = $request->input('active');
        $usuario->save();
        
        $profesores = Usuari::where('rol', 'professor')->get();
        return View('mostrar.centre')->  with('profesores', $profesores);
    }
    function borrarProfesor(Request $request){
        $usuario = Usuari::find($request -> id);
        $usuario -> delete();
        $profesores = Usuari::where('rol', 'professor')->get();
        return View('mostrar.centre')->with('profesores', $profesores);        
    }
    function borrarAlumno(Request $request){
        $usuario = Usuari::find($request->id);
        $usuario -> delete();
        $alumnado = Usuari::where('rol', 'estudiant')->get();
        return View('mostrar.profesor')->  with('alumnado', $alumnado);        
    }
}