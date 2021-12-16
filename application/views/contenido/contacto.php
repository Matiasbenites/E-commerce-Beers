<section>
  <div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
    <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>CONTACTO</B></p>
  </div>

  <div class="container py-1" style="background-color: rgba(233, 232, 232, 0.529);">
    <div class="container border mt-4 mb-4">
      <div class="row align-items-start">
        <div class="col-sm-5">
          <div class="col-sm-5" style="font-size: 30px; color:goldenrod">CONTACTANOS</div>

          <?php echo form_open('registrar_consulta'); ?>
          <small class="text-muted">Campos obligatorios (<span style="color: red;">*</span>)</small>
          <div class="row my-3">
            <div class="col-sm-12">
              <div class="form-group w-100">
                <label for="nombre_apellido" class="text-muted">Nombre y Apellido<span style="color: red;">*</span></label>
                <?php echo form_input(['name' => 'nombre_apellido', 'id' => 'nombre_apellido', 'class' => 'form-control', 'placeholder' => 'Ingrese Nombre y Apellido', 'autofocus' => 'autofocus', 'value' => set_value('nombre_apellido')]); ?>
              </div><span class="text-danger"><?php echo form_error('nombre_apellido') ?></span>
            </div>
            <div class="col-sm-12">
              <div class="form-group w-100">
                <label for="telefono" class="text-muted">Telefono<span style="color: red;">*</span></label>
                <?php echo form_input(['name' => 'telefono', 'id' => 'telefono', 'class' => 'form-control', 'placeholder' => 'Ingrese telefono', 'autofocus' => 'autofocus', 'value' => set_value('telefono')]); ?>
              </div><span class="text-danger"><?php echo form_error('telefono') ?></span>
            </div>
            <div class="col-sm-12">
              <div class="form-group w-100">
                <label for="email" class="text-muted">Email<span style="color: red;">*</span></label>
                <?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control', 'placeholder' => 'Ingrese Email', 'autofocus' => 'autofocus', 'value' => set_value('email')]); ?>
              </div><span class="text-danger"><?php echo form_error('email') ?></span>
            </div>
            <div class="col-sm-12">
              <div class="form-group w-100">
                <label for="motivo" class="text-muted">Motivo<span style="color: red;">*</span></label>
                <?php echo form_input(['name' => 'motivo', 'id' => 'motivo', 'class' => 'form-control', 'placeholder' => 'Ingrese Motivo', 'autofocus' => 'autofocus', 'value' => set_value('motivo')]); ?>
              </div><span class="text-danger"><?php echo form_error('motivo') ?></span>
            </div>
          </div>
          <div class="row align-items-end">
            <div class="col-sm-12">
              <div class="form-group w-100">
                <label for="mensaje" class="text-muted">Mensaje<span style="color: red;">*</span></label>
                <?php echo form_textarea(['name' => 'mensaje', 'id' => 'mensaje', 'class' => 'form-control', 'rows' => '2', 'placeholder' => 'Ingrese Mensaje', 'autofocus' => 'autofocus', 'value' => set_value('mensaje')]); ?>
              </div><span class="text-danger"><?php echo form_error('mensaje') ?></span>
            </div>

            <div class="col-sm-12">
              <div class="row justify-content-center">
                <div class="col">
                  <div class="form-group w-100">
                    <?php echo form_submit('Enviar', 'Enviar', "class='btn btn-outline-warning btn-block btn-lg'"); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>

        </div>

        <div class="col-sm-7">
          <div class="row">
            <div class="col-sm-7" style="font-size: 30px; color:goldenrod">UBICACIÓN</div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3092.718530948626!2d-77.2688224851465!3d39.181119079527875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b62c14f85a02c1%3A0xca5212e420778dcb!2sBeers%20%26%20Cheers!5e0!3m2!1ses-419!2sar!4v1619307955150!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="TRUE" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>