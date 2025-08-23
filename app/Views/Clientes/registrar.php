<?= $header ?>


<div class="container my-2">
  <h4>Registro de clientes</h4>
  <a href="<?= base_url('clientes') ?>">Volver a la lista</a>

  <!-- 
  PARA GUARDAR:
    1. Construye la interfaz VISTA
    2. Definir un nueva RUTA utilizando "POST" (envía desde un formulario)
    3. Crear un método en el controlador para recibir los datos y enviarlos a la BD
  -->

  <form action="<?= base_url('clientes/guardar') ?>" method="POST">
    <div class="card mt-3">
      <div class="card-body">
        <div class="mb-2">
          <label for="apellidos">Apellidos</label>
          <input type="text" class="form-control" name="apellidos" id="apellidos" required autofocus>
        </div>
        <div class="mb-2">
          <label for="nombres">Nombres</label>
          <input type="text" class="form-control" name="nombres" id="nombres" required>
        </div>
        <div class="mb-2">
          <label for="dni">DNI</label>
          <input type="text" class="form-control" name="dni" id="dni" maxlength="8" required>
        </div>
        <div class="mb-2">
          <label for="telefono">Teléfono</label>
          <input type="text" class="form-control" name="telefono" id="telefono" maxlength="9" required>
        </div>
      </div>
      <div class="card-footer text-end">
        <button type="reset" class="btn btn-sm btn-outline-secondary">Cancelar</button>
        <!-- Los botones que estén dentro del formulario con TYPE=SUBMIT ejecutan/disparan al ACTION -->
        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
      </div>
    </div>
  </form>

</div>


<?= $footer ?>