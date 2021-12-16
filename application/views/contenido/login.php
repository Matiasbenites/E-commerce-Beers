<div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
    <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>INICIAR SESION</B></p>
  </div>
<div class="container">
    <div class="row my-5 justify-content-center" style="background-color:rgba(233, 232, 232, 0.529);">
        <div class="col-sm-5 py-3 mx-2 my-2">
            <div class="container shadow p-3 mb-5 bg-white rounded" style="background-color: white;">
            <span class="text-danger font-weigth-bold"><?php echo validation_errors()?></span>

                    <?php echo form_open('ingresar') ?>
                    <div class="form-group">
                        <label for="email" class="text-muted">Correo electrónico <span style="color: red;"></span></label>
                        <?php echo form_input(['name' => 'email', 'id' => 'email', 'type' => 'email', 'class' => 'form-control', 'placeholder' => 'Ingrese Email', 'value' => set_value('email')]); ?>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-muted">Contraseña <span style="color: red;"></span></label>
                        <?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Ingrese Password', 'value' => set_value('password')]); ?>
                    </div>
                    <div class="form-group form-check my-n2">
                        <input type="checkbox" class="form-check-input border-dark" id="exam1eCheck1">
                        <label class="form-check-label" for="exampleCheck1">Recordarme</label>
                    </div>
                    <div class="my-2">
                        <a href="<?php echo base_url('Recuperar_password') ?>" style="color: goldenrod;">Olvidaste tu contraseña?</a></br>
                    </div>
                    <div class="form_group">
                        <?php echo form_submit('Ingresar', 'Ingresar', "class='btn btn-outline-warning btn-lg btn-block my-3'") ?>
                    </div>

                    <?php echo form_close(); ?>
           
                </div>
            </div>
        </div>
        
    </div>
</div>
