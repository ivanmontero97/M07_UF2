<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="formulario-login" method="POST" action="{{ route('validateSignIn') }}"> <!-- Ojo , estamos asociando el action al name de la ruta definido en lugar de a la URI !-->
        <div>
            <label>Introduce el <b>email</b></b></label>

            <input type="text" name="email" >
        </div>
        <div>
            <label>Introduce la <b>contraseña</b>:</label>
            <input type="password" name="password" >
        </div>
        <br>
         <div>
            <label> Recordar contraseña </label>
            <input type="radio" id="rememberMe" value="true">
        </div>
        <br>   
        <input type="submit" value="Siguiente">
        <p  id="mensaje-error-login" style= color:red ><b></b><p>
    </form>
    <br>
    <p>¿Aún no tienes cuenta? </p>
     <a href = "{{ route('name_crearUsuario') }}">  <b>Crear cuenta</b> </a>
   
</body>
</html>