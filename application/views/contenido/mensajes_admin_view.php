<section>
    <div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
        <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>LISTA DE MENSAJES</B></p>
    </div>
    <div class="container">
        <div class="container my-5">
            <?php echo form_open('buscar_clientes'); ?>
            <!-- input -->
            <div class="row justify-content-start">
                <label for="email" class="mx-2 text-center mt-n2"><strong>Buscar Mensaje</strong></label>
                <?php echo form_input(['name' => 'email', 'id' => 'email', 'placeholder' => 'Ingrese Email', 'class' => 'form-control mx-2 w-50 mt-n3']);  ?>
                <!-- boton buscar -->
                <?php echo form_submit('Buscar', 'Buscar', "class= 'btn btn-outline-warning my-2 mx-2 mt-n3'") ?>
            </div> </br>

            <?php echo form_close(); ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">N° Mensaje</th>
                        <th scope="col">Nombre y Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Motivo</th>
                        <th scope="col">Mensaje</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($mensajes as $row) { ?>

                        <tr style="font-size: 15px;" class="text-left shadow py-5 my-5">
                            <td style="vertical-align: inherit;"><?php echo $row->id_mensaje; ?> </td>
                            <td style="vertical-align: inherit;"><?php echo $row->nombre_apellido; ?> </td>
                            <td style="vertical-align: inherit;"><?php echo $row->email; ?> </td>
                            <td style="vertical-align: inherit;"><?php echo $row->telefono; ?> </td>
                            <td style="vertical-align: inherit;"><?php echo $row->motivo; ?> </td>
                            <td style="vertical-align: inherit;"><?php echo $row->mensaje; ?> </td>


                            <?php
                    if (($row->estado) == 1) { ?>
                        <td> <a class="btn btn-outline-danger" href="<?php echo base_url("Mensaje_controller/eliminar_mensaje/$row->id_mensaje"); ?>">No Leído</a></td>

                    <?php } else { ?>
                        <td><a class="btn btn-outline-success" href="<?php echo base_url("Mensaje_controller/activar_mensaje/$row->id_mensaje"); ?>"> Leído</a></td>
                    <?php } ?>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</section>