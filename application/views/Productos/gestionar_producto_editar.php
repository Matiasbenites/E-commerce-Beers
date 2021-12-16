<div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
    <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>EDICION DE PRODUCTOS</B></p>
</div>
<div class="container">
    <div class="w-50-mx-auto">
        <?php echo form_open_multipart("productos_controller/actualizar_producto/$id_producto"); ?>

        <div class="form-group">
           <strong><label for="nombre">Nombre del producto</label></strong>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => "$nombre"]); ?>
        </div><span class="text-danger"><?php echo form_error('nombre'); ?></span>

        <div class="form-group">
            <strong><label for="categoria">Categoría</label></strong>
            <?php
            $lista['0'] = 'Seleccione categoria';
            foreach ($categorias as $row) {
                $lista[$row->categoria_id] = $row->categoria_desc;
            }
            echo form_dropdown('categoria', $lista, $categoria, 'class = "form-control"');
            ?>
        </div>
        <span class="text-danger"><?php echo form_error('categoria'); ?> </span>
        <div class="form-group">
            <img src="<?php echo base_url("/upload/"), $imagen ?>" alt="" height="100" width="100">
            <strong><label for="imagen" class="text-muted">Imagen</label></strong>
            <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type' => 'file']); ?>
        </div><span class="text-danger"><?php echo form_error('imagen') ?></span>

        <div class="form-group">
            <strong><label for="descripcion">Descripción</label></strong>
            <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => "$descripcion"]); ?>
        </div><span class="text-danger"><?php echo form_error('descripcion'); ?></span>

        <div class="form-group">
            <strong><label for="stock">Stock</label></strong>
            <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => "$stock"]); ?>
        </div><span class="text-danger"><?php echo form_error('stock'); ?></span>

        <div class="form-group">
            <strong><label for="precio">Precio</label></strong>
            <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => "$precio"]); ?>
        </div><span class="text-danger"><?php echo form_error('precio'); ?></span>



        <div class="form-group">
            <?php echo form_submit('Modificar', 'Modificar', "class = 'btn btn-lg btn-outline-warning'"); ?>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>