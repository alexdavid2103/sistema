<div class="form-group Nombre">
    <label for="Nombre" class="form-label"> Nombre</label>
    <input type="text" name="Nombre" value="{{ $empleado->Nombre }}" id="Nombre">
</div>

<div class="form-group Apellido">
    <label for="Apellido" class="form-label"> Apellido</label>
    <input type="text" name="Apellido" value="{{ $empleado->Apellido }}" id="Apellido">
</div>

<div class="form-group Sexo">
    <label for="Sexo" class="form-label"> Sexo</label>
    <input type="text" name="Sexo" value="{{ $empleado->Sexo }}" id="Sexo">
</div>

<div class="form-group Correo">
    <label for="Correo" class="form-label"> Correo</label>
    <input type="email" name="Correo" value="{{ $empleado->Correo }}" id="Correo">
</div>

<div class="form-group Telefono">
    <label for="Telefono" class="form-label"> Telefono</label>
    <input type="number" name="Telefono" value="{{ $empleado->Telefono }}" id="Telefono">
</div>

<div class="form-group Foto">
    <label for="Foto" class="form-label"> Foto</label>
    {{ $empleado->Foto }}
    <input type="file" name="Foto" value="" id="Foto">
</div>

<div class="form-group submit-btn">
    <input type="submit" value="Guardar Datos">
</div>