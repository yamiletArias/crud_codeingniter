<?= $header ?>


<div class="container my-2">
  <h4>Lista de clientes</h4>
  <a href="<?= base_url('clientes/registrar') ?>">Registrar</a>

  <hr>

  <?php //var_dump($clientes); ?>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>DNI</th>
        <th>Teléfono</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($clientes as $cliente): ?>
      <tr>
        <td><?= $cliente['id'] ?></td>
        <td><?= $cliente['apellidos'] ?></td>
        <td><?= $cliente['nombres'] ?></td>
        <td><?= $cliente['dni'] ?></td>
        <td><?= $cliente['telefono'] ?></td>
        <td>
          <a href="<?= base_url('clientes/eliminar/') . $cliente['id'] ?>">Eliminar</a>
          <a href="<?= base_url('clientes/editar/') . $cliente['id'] ?>">Editar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>


<?= $footer ?>
