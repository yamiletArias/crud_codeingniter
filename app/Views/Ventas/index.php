<?= $header ?>

<div class="container my-2">
    <div class="my-3">
        <h2>Lista de Ventas</h2>
        <a href="<?= base_url('ventas/create') ?>" class="btn btn-sm btn-primary text-end">Registrar</a>
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
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Total (S/.)</th>
                                <th>Cantidad</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventas as $venta): ?>
                                <tr>
                                    <td><?= $venta['id'] ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($venta['fecha'])) ?></td>
                                    <td><?= $venta['nombres'] ? $venta['nombres'] . ' ' . $venta['apellidos'] : 'Sin cliente' ?>
                                    </td>
                                    <td><?= number_format($venta['total'], 2) ?></td>
                                    <td><?= $venta['total_cantidad'] ?? 0 ?></td>

                                    <td class="text-center">
                                        <a href="<?= base_url('ventas/delete/') . $venta['id'] ?>" type="button"
                                            class="btn btn-sm btn-outline-danger">Eliminar</a>
                                        <a href="<?= base_url('ventas/edit/') . $venta['id'] ?>" type="button"
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