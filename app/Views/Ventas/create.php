<?= $header ?>

<div class="container my-3">

    <div class="my-3">
        <h2>Registro de Ventas</h2>
        <a href="<?= base_url('ventas') ?>" class="btn btn-sm btn-outline-primary">Volver</a>
    </div>

    <div class="mb-2">
        <form action="<?= base_url('ventas/save') ?>" method="POST">
            <div class="card mt-3">

                <div class="mb-2">
                    <div class="card-body">

                        <div class="row g-2">

                            <!-- CAMPOS DE CLIENTE -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="idcliente" id="idcliente" class="form-select">
                                        <option value="">Seleccione Cliente</option>
                                        <?php foreach ($clientes as $cliente): ?>
                                            <option value="<?= $cliente['id'] ?>">
                                                <?= $cliente['nombres'] . ' ' . $cliente['apellidos'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="idcliente">Seleccionar Cliente</label>
                                </div>
                            </div>

                            <!-- CAMPO DETALLE DE VENTA -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="productos[]" id="productos" class="form-select">
                                        <option value="">Seleccione Producto</option>
                                        <?php foreach ($productos as $producto): ?>
                                            <option value="<?= $producto['id'] ?>" data-price="<?= $producto['precio'] ?>">
                                                <?= $producto['nombre'] ?> - S/.
                                                <?= number_format($producto['precio'], 2) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="productos">Seleccionar Producto</label>
                                </div>
                            </div>

                            <!-- CAMPOS DE CANTIDAD DEL PRODUCTOS -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" placeholder="Cantidad de producto"
                                        id="cantidad" name="cantidad" required>
                                    <label for="form-label">Cantidad</label>
                                </div>
                            </div>

                            <!-- TOTAL DE VENTA -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Total" id="total" name="total"
                                        readonly>
                                    <label for="form-label">Total</label>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-footer text-end">
                    <button type="reset" class="btn btn-sm btn-outline-secondary">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                </div>

            </div>
        </form>
    </div>

</div>

<script>
    document.getElementById('productos').addEventListener('change', updateTotal);
    document.getElementById('cantidad').addEventListener('input', updateTotal);

    function updateTotal() {
        let total = 0;
        let cantidad = document.getElementById('cantidad').value;
        let selectedProduct = document.getElementById('productos').selectedOptions[0];

        if (selectedProduct) {
            let price = parseFloat(selectedProduct.getAttribute('data-price'));
            total += price * cantidad;
        }

        document.getElementById('total').value = total.toFixed(2); //decimal
</script>

<?= $footer ?>