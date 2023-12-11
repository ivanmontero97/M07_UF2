<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Benvingut administrador el teu email es {{$email}}<h1>  
    <h2>Llista de professors :</h2> 
    <ul>
        @foreach($llistaProfesors as $clave => $valor)
            <li> <b>Nombre  :</b> {{$clave}}     <br>   <b>Email :</b>  {{$valor}}</li>
        @endforeach
    </ul>
<a href="{{ route('name_login') }}">Volver al inicio de sesión</a>
</body>
</html>