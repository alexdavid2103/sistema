<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/form.css">
    <title>Document</title>
</head>

<body>
    <div class="text-center">
        <h2 class="text animado ">Bienvenido</h2>
        <p>Aqui podrás ver toda la informacion acerca de los empleados registrados en el sistema</p>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered" class="container mt-4">
            <thead>
                <a href="{{ route('empleado.create') }}" class="btn btn-info my-2 nuevo">Crear Nuevo</a>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Sexo</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td><img src="{{ asset('storage/' . $empleado->Foto) }}" alt="Foto del Empleado" width="100"></td>
                        <td>{{ $empleado->Nombre }}</td>
                        <td>{{ $empleado->Apellido }}</td>
                        <td>{{ $empleado->Sexo }}</td>
                        <td>{{ $empleado->Correo }}</td>
                        <td>{{ $empleado->Telefono }}</td>
                        <td>
                            <a href="{{ url('/empleado/' . $empleado->id . '/edit') }}" class="btn btn-primary btn-inline">
                                Editar
                            </a>
                            <form action="{{ url('/empleado/' . $empleado->id) }}" method="post" class="btn-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger" onclick="return confirm('quieres borrar?')"
                                    value="Borrar">
                            </form>

                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
