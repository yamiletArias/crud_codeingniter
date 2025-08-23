<?= $header ?>

<div class="container my-2">

    <div class="my-3">
        <h4>Registro de proveedor</h4>
        <a href="<?= base_url('proveedores') ?>" class="btn btn-sm btn-outline-primary">Volver</a>
    </div>

    <div class="mb-2">
        <form method="POST" action="<?= base_url('proveedores/update') ?>">
            
            <input type="hidden" name="id" value="<?= $proveedor['id'] ?>">    
            
            <div class="card mt-3">

                <div class="mb-2">
                    <div class="card-body">

                        <div class="row g-2">

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Nombre del proveedor"
                                        id="nombre" name="nombre" value="<?= $proveedor['nombre'] ?>" required>
                                    <label for="form-label">Nombre del Proveedor</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Telefono" id="telefono"
                                        name="telefono" maxlength="9" value="<?= $proveedor['telefono'] ?>" required>
                                    <label for="form-label">Telefono</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" 
                                        value="<?= $proveedor['email'] ?>"
                                        required>
                                    <label for="form-label">Email</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Direccion" id="direccion"
                                        name="direccion" value="<?= $proveedor['direccion'] ?>" required>
                                    <label for="form-label">Direccion</label>
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