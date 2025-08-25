<?= $header ?>

<div class="container my-2">

    <div class="my-3">
        <h2>Registro de Productos</h2>
        <a href="<?= base_url('productos') ?>"></a>
    </div>

    <div class="mb-2">
        <form method="POST" action="<?= base_url('productos/save') ?>">
            <div class="card mt-3">

                <div class="mb-2">
                    <div class="card-body">

                        <div class="row g-2">

                            <!-- CAMPO DE NOMBRE DEL PRODUCTO -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Nombre del Producto"
                                        id="nombre" name="nombre" required>
                                    <label for="form-label">Nombre del Producto</label>
                                </div>
                            </div>

                            <!-- CAMPO DE LA DESCRIPCION DEL PRODUCTO -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Descripcion del Producto"
                                        id="descripcion" name="descripcion" required>
                                    <label for="form-label">Descripcion del Producto</label>
                                </div>
                            </div>

                            <!-- CAMPO DEL PRECIO DEL PRODUCTO -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control text-end" placeholder="Precio del Producto"
                                        id="precio" name="precio" required>
                                    <label for="form-label">Precio del Producto</label>
                                </div>
                            </div>

                            <!-- CAMPO DEL DESCUENTO DEL PRODUCTO -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control text-end" placeholder="Precio del Producto"
                                        id="descuento" name="descuento">
                                    <label for="form-label">Descuento del Producto</label>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select name="idproveedor" id="idproveedor" class="form-select">
                                        <option value="">Sin proveedor</option>
                                        <?php foreach ($proveedores as $proveedor): ?>
                                            <option value="<?= $proveedor['id'] ?>"><?= $proveedor['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="idproveedor">Seleccionar Proveedor</label>
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

<?= $footer ?>