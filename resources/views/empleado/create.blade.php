<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data"  id="empleadoForm">
        @csrf
        <h2>Crear Empleado</h2>
        <div class="form-group Nombre">
            <label for="Nombre"> Nombre</label>
            <input type="text" name="Nombre" id="Nombre" placeholder="Ingrese su Nombre">
        </div>

        <div class="form-group Apellido">
            <label for="Apellido"> Apellido</label>
            <input type="text" name="Apellido" id="Apellido" placeholder="Ingrese su Apellido">
        </div>

        <div class="form-group Sexo">
            <label for="Sexo">Sexo</label>
            <select name="Sexo" id="Sexo">
                <option value="" selected disabled>Seleciona tu Sexo</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        <div class="form-group Correo">
            <label for="Correo"> Correo</label>
            <input type="email" name="Correo" id="Correo" placeholder="Ingrese su Correo">
        </div>

        <div class="form-group Telefono">
            <label for="Telefono"> Telefono</label>
            <input type="number" name="Telefono" id="Telefono" placeholder="Ingrese su Telefono">
        </div>

        <div class="form-group Foto">
            <label for="Foto"> Foto</label>
            <input type="file" name="Foto" id="Foto">
        </div>

        <div class="form-group submit-btn">
            <input type="submit" value="Guardar Datos">
        </div>
    </form>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Sus datos han sido guardados exitosamente.</p>
            <button id="goBackBtn">Volver</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(function() {
    $("#empleadoForm").submit(function(event) {
        event.preventDefault();
        
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                // Muestra el modal de éxito
                $("#myModal").css("display", "block");
            },
            error: function(error) {
                alert("Hubo un error al guardar los datos. Por favor, inténtelo nuevamente.");
            }
        });
    });

    // Cierra el modal al hacer clic en la "X" o en el botón "Volver"
    $(".close, #goBackBtn").click(function() {
        $("#myModal").css("display", "none");
        
        // Redirige a otra vista o página si se hace clic en "Volver"
        if (this.id === "goBackBtn") {
            window.location.href = '{{ route('empleado.index') }}';
        }
    });
});
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>
