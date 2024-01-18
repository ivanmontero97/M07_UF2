<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="POST" action="/alumno/{{$alumn->id}}">
@method('put')
@csrf

<h1>Editar valores de alumno :</h1>
<div>
    <label>Nombre :</label>
    <input type="text" name="name" placeholder="Juan" value="{{$alumn->nom}}" >
</div>
<div>
    <label>Apellidos :</label>
    <input type="text" name="surname" placeholder="Lopez" value="{{$alumn->cognom}}">
</div>
<div>
    <label>Email : </label>
    <input type="text" name="email" placeholder="prueba@correo.es" value="{{$alumn->email}}" >
</div>
<div>
    <label>Contraseña </label>
    <input type="password" name="password" placeholder="*******" >
</div>
<div>
    <p>Elige un rol</p>
        <div id="mensaje-error-rol" style="color:red"></div>
        <input type="radio" id="adminCheckbox" name="rol" value="estudiant">
        <label for="adminCheckbox">alumnat</label>

        <input type="radio" id="usuarioCheckbox" name="rol" value="professor">
        <label for="usuarioCheckbox">Professorat</label>

        <input type="radio" id="adminCheckbox" name="rol" value="centre">
        <label for="adminCheckbox">centre</label>
</div>
<div>
    <p>Elige un estado</p>
    <div id="mensaje-error-active" style="color:red"></div>
    <input type="radio" id="activadoCheckbox" name="active" value="0" >
    <label for="activadoCheckbox">Activado</label>

    <input type="radio" id="Desactivado" name="active" value="1">
    <label for="Desactivado">Desactivado</label>
</div>
<input type="submit" value="Enviar">
   </form>
</body>
</html>