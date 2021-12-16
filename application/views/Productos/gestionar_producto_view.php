<div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
    <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>EDICION DE PRODUCTOS</B></p>
</div>
<div class="container">
    <?php echo form_open('buscar_producto'); ?>
    <!-- input -->
    <div class="row justify-content-start">
        <label for="nombre" class="mx-2 text-center mt-4"><strong>Buscar Producto</strong></label></br>
        <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'placeholder' => 'Ingrese Nombre', 'class' => 'form-control mx-2 w-50 mt-3']);  ?>
        <!-- boton buscar -->
        <?php echo form_submit('Buscar', 'Buscar', "class= 'btn btn-outline-warning my-2 mx-2 mt-3'") ?> 
    </div></br>

    <?php echo form_close(); ?>
    <table id="mytable" class="table table-bordred table-striped table-hover">
        <thead>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Editar</th>
            <th>Alta/Baja</th>
        </thead>


        <tbody>
            <?php foreach ($producto as $row) { ?>

                <tr>
                    <td> <?php echo $row->nombre; ?> </td>
                    <td> <?php echo $row->categoria_desc; ?> </td>
                    <td> <?php echo $row->descripcion; ?> </td>
                    <td> <?php echo $row->stock; ?> </td>
                    <td> <?php echo $row->precio; ?> </td>
                    <td>
                        <img src="<?php echo base_url("/upload/") . $row->imagen ?>" alt="" height="100" width="100">
                    </td>

                    <td> <a class="btn btn-warning" href="<?php echo base_url("editar_producto/$row->id_producto"); ?>"> Editar</a></td>


                    <?php
                    if (($row->estado) == 1) { ?>
                        <td> <a class="btn btn-success" href="<?php echo base_url("eliminar_producto/$row->id_producto"); ?>"> ON</a></td>

                    <?php } else { ?>
                        <td><a class="btn btn-danger" href="<?php echo base_url("activar_producto/$row->id_producto"); ?>"> OFF </a></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>

    </table>


</div>