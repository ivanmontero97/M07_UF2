<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Benvingut Profesor</h1>  

@if(count($alumnado) > 0 )
    <table>
  <tr>
    <th style="margin:2px">Nombre</th>
    <th style="margin:2px">Apellido</th>
    <th style="margin:2px">Email</th>
    <th style="margin:2px">Activo</th>
    <th style="margin:2px"></th>
    <th style="margin:2px"></th>
  </tr>
  @foreach($alumnado as $alumne)
  <tr>
    <td style="margin:2px">{{$alumne->nom}} </td>
    <td style="margin:2px">{{$alumne->cognom}}</td>
    <td style="margin:2px">{{$alumne->email}}</td>
    <td style="margin:2px">{{$alumne->Activo}}</td>
    <td style="margin:2px"><a href="{{url('/editarAlumno/' . $alumne->id)}}" >Editar</a></td>
    <td style="margin:2px"><form action="{{('/borrarAlumno/' . $alumne->id)}}" method="post">
    @method("delete")
    @csrf
    <input type="submit" value="delete">
    </form></td>

  </tr>
  @endforeach
</table>
@else
    <p>No hay registros de alumnos en la BD en este momento</p>
@endif
<a href="{{ route('name_login') }}">Volver al inicio de sesión</a>

</body>
</html>