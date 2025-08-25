<?= $header ?>

<div class="my-3">

    <div class="my-3">
        <h2>Registro de Ventas</h2>
        <a href="<?= base_url('ventas') ?>" class="btn btn-sm btn-outline-primary">Volver</a>
    </div>

    <div class="mb-2">
        <form action="">
            <div class="card mt-3">

                <div class="mb-2">
                    <div class="card-body">

                        <div class="row g-2">

                            <!-- CAMPOS DE CLIENTE -->
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select name="idcliente" id="idcliente" class="form-select">
                                        <option value="">Sin Cliente</option>
                                        <?php foreach ($clientes as $cliente): ?>
                                            <option value="<?= $cliente['id'] ?>">
                                                <?= $venta['nombres'] ? $venta['nombres'] . ' ' . $venta['apellidos'] : 'Sin cliente' ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="idproveedor">Seleccionar Proveedor</label>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>

</div>

<?= $footer ?>