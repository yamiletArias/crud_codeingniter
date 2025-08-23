<?= $header ?>


<div class="container my-2">
  <h4>Editar cliente</h4>
  <a href="<?= base_url('clientes') ?>">Volver a la lista</a>

  <?php //print_r($cliente); ?>

  <form action="<?= base_url('clientes/actualizar') ?>" method="POST">

    <!-- Crearemos una caja invisible -->
    <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

    <div class="card mt-3">
      <div class="card-body">
        <div class="mb-2">
          <label for="apellidos">Apellidos</label>
          <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?= $cliente['apellidos'] ?>" required autofocus>
        </div>
        <div class="mb-2">
          <label for="nombres">Nombres</label>
          <input type="text" class="form-control" name="nombres" id="nombres" value="<?= $cliente['nombres'] ?>" required>
        </div>
        <div class="mb-2">
          <label for="dni">DNI</label>
          <input type="text" class="form-control" name="dni" id="dni" maxlength="8" value="<?= $cliente['dni'] ?>" required>
        </div>
        <div class="mb-2">
          <label for="telefono">Teléfono</label>
          <input type="text" class="form-control" name="telefono" id="telefono" maxlength="9" value="<?= $cliente['telefono'] ?>" required>
        </div>
      </div>
      <div class="card-footer text-end">
        <button type="reset" class="btn btn-sm btn-outline-secondary">Cancelar</button>
        <!-- Los botones que estén dentro del formulario con TYPE=SUBMIT ejecutan/disparan al ACTION -->
        <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
      </div>
    </div>
  </form>

</div>


<?= $footer ?>