<?= $header ?>

<div class="container my-2">

    <div class="my-3">
        <h2>Lista de Proveedores</h2>
        <a href="/proveedores/create" class="btn btn-sm btn-primary text-end">Registrar</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-striped">
                        <colgroup>
                            <col width="5%">
                            <col width="35%">
                            <col width="10%">
                            <col width="20%">
                            <col width="15%">
                            <col width="15%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre del proveedor</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Direccion</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($proveedores as $proveedor): ?>
                                <tr>
                                    <td><?= $proveedor['id'] ?></td>
                                    <td><?= $proveedor['nombre'] ?></td>
                                    <td><?= $proveedor['telefono'] ?></td>
                                    <td><?= $proveedor['email'] ?></td>
                                    <td><?= $proveedor['direccion'] ?></td>

                                    <td class="text-center">
                                        <a href="<?= base_url('proveedores/delete/') . $proveedor['id'] ?>" type="button"
                                            class="btn btn-sm btn-outline-danger">Eliminar</a>
                                        <a href="<?= base_url('proveedores/edit/') . $proveedor['id'] ?>" type="button"
                                            class="btn btn-sm btn-outline-primary">Editar</a>
                                        <!-- <button type="button" class="btn btn-sm btn-outline-primary">Editar</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Eliminar</button> -->
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