<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/estilos.css">

    <title>Editar</title>
</head>

<body>
    <form action="{{ url('/empleado/' . $empleado->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Editar Empleado</h2>
        {{ method_field('PATCH') }}
        @include('empleado.form')

    </form>
</body>

</html>
