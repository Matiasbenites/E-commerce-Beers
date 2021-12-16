<div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
    <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>REGISTRARSE</B></p>
</div>
<div class="container">
    <div class="row my-5 justify-content-center" style="background-color:rgba(233, 232, 232, 0.529);">
        <div class="col-sm-7 py-3 mx-2 my-2">
            <div class="container shadow p-3 mb-5 bg-white rounded" style="background-color: white;">



                <?php echo form_open('registrar'); ?>
                <small class="text-muted">Campos obligatorios (<span style="color: red;">*</span>)</small>
                <div class="form-group">
                    <label for="nombre" class="text-muted">Nombre <span style="color: red;">*</span></label>
                    <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'autofocus' => 'autofocus', 'value' => set_value('nombre')]); ?>
                </div> <span class="text-danger"><?php echo form_error('nombre') ?></span>

                <div class="form-group">
                    <label for="apellido" class="text-muted">Apellido <span style="color: red;">*</span></label>
                    <?php echo form_input(['name' => 'apellido', 'id' => 'apellido', 'class' => 'form-control', 'placeholder' => 'Ingrese Apellido', 'autofocus' => 'autofocus', 'value' => set_value('apellido')]); ?>
                </div><span class="text-danger"><?php echo form_error('apellido') ?></span>

                <div class="form-group">
                    <label for="email" class="text-muted">Correo electrónico <span style="color: red;">*</span></label>
                    <?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control', 'placeholder' => 'Ingrese Email', 'autofocus' => 'autofocus', 'value' => set_value('email')]); ?>
                </div><span class="text-danger"><?php echo form_error('email') ?></span>

                <div class="form-group">
                    <label for="telefono" class="text-muted">Telefono<span style="color: red;">*</span></label>
                    <?php echo form_input(['name' => 'telefono', 'id' => 'telefono', 'class' => 'form-control', 'placeholder' => 'Ingrese telefono', 'autofocus' => 'autofocus', 'value' => set_value('telefono')]); ?>
                </div><span class="text-danger"><?php echo form_error('telefono') ?></span>

                <div class="form-group">
                    <label for="password" class="text-muted">Contraseña <span style="color: red;">*</span></label>
                    <?php echo form_input(['name' => 'password', 'id' => 'password', 'class' => 'form-control', 'type' => 'password', 'placeholder' => 'Ingrese Contraseña', 'autofocus' => 'autofocus', 'value' => set_value('password')]); ?>
                </div><span class="text-danger"><?php echo form_error('password') ?></span>

                <div class="form-group">
                    <label for="passconf" class="text-muted">Repetir Contraseña<span style="color: red;">*</span></label>
                    <?php echo form_input(['name' => 'passconf', 'id' => 'passconf', 'class' => 'form-control', 'type' => 'password', 'placeholder' => 'Repetir Contraseña', 'autofocus' => 'autofocus', 'value' => set_value('passconf')]); ?>
                </div><span class="text-danger"><?php echo form_error('passconf') ?></span>

                <small id="emailHelp" class="form-text text-muted">Sus datos personales se utilizarán para respaldar su experiencia en este sitio web, para administrar el acceso a su cuenta y demás fines descritos explícitamente en nuestros <a style="color: #66362b;" href="<?php echo base_url('Proyecto_controller/terminos') ?>"> Términos y condiciones de servicio.</a></small>

                <div class="form_group">
                    <?php echo form_submit('Registrarme', 'Registrarme', "class='btn btn-outline-warning btn-lg btn-block my-3'"); ?>
                </div>


                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>