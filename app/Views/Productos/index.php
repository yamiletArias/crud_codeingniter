<?= $header ?>

<div class="container my-2">

    <div class="my-3">
        <h2>Lista de Productos</h2>
        <a href="<?= base_url('productos/create') ?>" class="btn btn-sm btn-primary text-end">Registrar</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-striped">
                        <colgroup>
                            <col width="5%">
                            <col width="15%">
                            <col width="30%">
                            <col width="5%">
                            <col width="10%">
                            <col width="20%">
                            <col width="15%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre del Producto</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Descuento</th>
                                <th>Proveedor</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td><?= $producto['id'] ?></td>
                                    <td><?= $producto['nombre'] ?></td>
                                    <td><?= $producto['descripcion'] ?></td>
                                    <td><?= $producto['precio'] ?></td>
                                    <td><?= $producto['descuento'] ?></td>
                                    <td><?= $producto['nombreprov'] ?? 'Sin Proveedor' ?></td>

                                    <td class="text-center">
                                        <a href="<?= base_url('productos/delete/') . $producto['id'] ?>" type="button"
                                            class="btn btn-sm btn-outline-danger">Eliminar</a>
                                        <a href="<?= base_url('productos/edit/') . $producto['id'] ?>" type="button"
                                            class="btn btn-sm btn-outline-primary">Editar</a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

<?= $footer ?>