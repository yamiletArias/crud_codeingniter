<?= $header ?>

<div class="container my-3">

    <div class="my-3">
        <h2>
            <h2>Actualizar Venta #<?= $venta['id'] ?></h2>
        </h2>
        <a href="<?= base_url('ventas') ?>" class="btn btn-sm btn-outline-primary">Volver</a>
    </div>

    <div class="mb-2">
        <form action="<?= base_url('ventas/update') ?>" method="POST">

            <input type="hidden" name="idventa" value="<?= $venta['id'] ?>">

            <div class="card mt-3">

                <div class="mb-2">
                    <div class="card-body">

                        <div class="row g-2">

                            <!-- CAMPOS DE CLIENTE -->
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select name="idcliente" id="idcliente" class="form-select" required>
                                        <option value="">Seleccione Cliente</option>
                                        <?php foreach ($clientes as $cliente): ?>
                                            <option value="<?= $cliente['id'] ?>" <?= $cliente['id'] == $venta['idcliente'] ? 'selected' : '' ?>>
                                                <?= $cliente['nombres'] . ' ' . $cliente['apellidos'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="idcliente">Seleccionar Cliente</label>
                                </div>
                            </div>

                            <!-- CAMPO DE DETALLE DE VENTA -->
                            <?php foreach ($detalleVentas as $index => $detalleVenta): ?>
                                <div class="row g-2 align-items-end mb-2">

                                    <!-- CAMPO DE PRODUCTOS -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select name="productos[]" id="productos" class="form-select producto-select"
                                                required data-index="<?= $index ?>">
                                                <option value="">Seleccione un Producto</option>
                                                <?php foreach ($productos as $producto): ?>
                                                    <option value="<?= $producto['id'] ?>"
                                                        data-price="<?= $producto['precio'] ?>"
                                                        <?= $producto['id'] == $detalleVenta['idproducto'] ? 'selected' : 'Sin producto' ?>>
                                                        <?= $producto['nombre'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="productos">Seleccionar Producto</label>
                                        </div>
                                    </div>

                                    <!-- CAMPO DE PRECIO -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control text-end precio-input" name="precios[]"
                                                value="<?= number_format($detalleVenta['precio'], 2) ?>" readonly
                                                data-index="<?= $index ?>">
                                            <label for="precio">Precio</label>
                                        </div>
                                    </div>

                                    <!-- CAMPOS DE CANTIDAD DEL PRODUCTOS -->
                                    <div class="col-md-6 mt-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control text-end cantidad-input"
                                                name="cantidades[]" value="<?= $detalleVenta['cantidad'] ?>" min="1"
                                                required data-index="<?= $index ?>">
                                            <label for="form-label">Cantidad</label>
                                        </div>
                                    </div>

                                    <!-- SUBTOTAL DE VENTA -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control text-end subtotal-input"
                                                value="<?= number_format($detalleVenta['cantidad'] * $detalleVenta['precio'], 2) ?>"
                                                readonly data-index="<?= $index ?>">
                                            <label for="form-label">Total</label>
                                        </div>
                                    </div>


                                </div>
                            <?php endforeach; ?>

                            <hr>

                            <!-- CAMPO DETALLE DE VENTA -->
                            <!-- <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="productos[]" id="productos" class="form-select">
                                        <option value="">Seleccione Producto</option>
                                    </select>
                                    <label for="productos">Seleccionar Producto</label>
                                </div>
                            </div> -->

                            <!-- CAMPO DEL PRECIO -->
                            <!-- <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Precio del producto"
                                        id="precio" name="precio" readonly>
                                    <label for="precio">Precio</label>
                                </div>
                            </div> -->

                            <!-- CAMPOS DE CANTIDAD DEL PRODUCTOS -->
                            <!-- <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" placeholder="Cantidad de producto"
                                        id="cantidad" name="cantidad" required>
                                    <label for="form-label">Cantidad</label>
                                </div>
                            </div> -->

                            <!-- TOTAL DE VENTA -->
                            <div class="col-md-3 ms-auto">
                                <div class="form-floating">
                                    <input type="text" class="form-control text-end" id="totalFinal" name="total"
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

    const productos = document.querySelectorAll('.producto-select');
    const cantidades = document.querySelectorAll('.cantidad-input');

    productos.forEach(select => {
        select.addEventListener('change', actualizarSubtotal);
    });

    cantidades.forEach(input => {
        input.addEventListener('input', actualizarSubtotal);
    })

    function actualizarSubtotal() {
        let total = 0;
        productos.forEach((select, index) => {
            const selectedOption = select.options[select.selectedIndex];
            const price = parseFloat(selectedOption.getAttribute('data-price') || 0);
            const cantidad = parseInt(document.querySelector(`.cantidad-input[data-index="${index}"]`).value) || 0;
            const subtotal = price * cantidad;

            document.querySelector(`.precio-input[data-index="${index}"]`).value = price.toFixed(2);
            document.querySelector(`.subtotal-input[data-index="${index}"]`).value = subtotal.toFixed(2);

            total += subtotal;
        });
        document.getElementById('totalFinal').value = total.toFixed(2);

    }
    window.addEventListener('DOMContentLoaded', actualizarSubtotal);

</script>

<?= $footer ?>