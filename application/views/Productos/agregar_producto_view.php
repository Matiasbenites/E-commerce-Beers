<div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
    <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>CARGA DE PRODUCTOS</B></p>
</div>
<div class="container">
    <div class="row my-5 justify-content-center" style="background-color:rgba(233, 232, 232, 0.529);">
        <div class="col-sm-7 py-3 mx-2 my-2">
            <div class="container shadow p-3 mb-5 bg-white rounded" style="background-color: white;">



                <?php echo form_open_multipart('insertar_producto'); ?>
                <div class="form-group">
                    <label for="nombre" class="text-muted">Nombre del Producto <span style="color: red;">*</span></label>
                    <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Ingrese nombre del producto', 'autofocus' => 'autofocus', 'value' => set_value('nombre')]); ?>
                </div><span class="text-danger"><?php echo form_error('nombre') ?></span>
                <div class="form-group">
                    <label for="categoria" class="text-muted">Categoria<span style="color: red;">*</span></label>
                    <?php
                    $lista['0'] = 'Seleccione una categoria';
                    foreach ($categorias as $row) {
                        $lista[$row->categoria_id] = $row->categoria_desc;
                    }
                    echo form_dropdown('categoria', $lista, '0', 'class="form-control"')
                    ?>
                </div> <span class="text-danger"><?php echo form_error('categoria') ?></span>

                <div class="form-group">
                    <label for="imagen" class="text-muted">Imagen <span style="color: red;">*</span></label>
                    <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type' => 'file', 'class' => 'form-control-file', 'value' => set_value('imagen')]); ?>
                </div> <span class="text-danger"><?php echo form_error('imagen') ?></span>

                <div class="form-group">
                    <label for="precio" class="text-muted">Precio <span style="color: red;">*</span></label>
                    <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'placeholder' => 'Ingrese Precio', 'autofocus' => 'autofocus', 'value' => set_value('precio')]); ?>
                </div><span class="text-danger"><?php echo form_error('precio') ?></span>

                <div class="form-group">
                    <label for="descripcion" class="text-muted">Descripcion<span style="color: red;">*</span></label>
                    <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'Ingrese Descripcion', 'autofocus' => 'autofocus', 'value' => set_value('descripcion')]); ?>
                </div><span class="text-danger"><?php echo form_error('descripcion') ?></span>

                <div class="form-group">
                    <label for="stock" class="text-muted">Stock <span style="color: red;">*</span></label>
                    <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control', 'placeholder' => 'Ingrese Cantidad de Stock', 'autofocus' => 'autofocus', 'value' => set_value('stock')]); ?>
                </div><span class="text-danger"><?php echo form_error('stock') ?></span>

                <div class="form_group">
                    <?php echo form_submit('Agregar', 'Agregar', "class='btn btn-outline-warning btn-block btn-lg my-3'"); ?>
                </div>


                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>