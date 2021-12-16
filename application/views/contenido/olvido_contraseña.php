<div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
    <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>RECUPERAR CONTRASEÑA</B></p>
  </div>
<div class="row">
    <div class="container text-center border bg-light my-5 py-3">
        <div class="col-sm text-left">
            <p class="text- left mt-5">¿Perdiste tu contraseña? Por favor, introduce tu nombre de usuario o correo electrónico. Recibirás un enlace para crear una contraseña nueva por correo electrónico. </p>
            <p class="text-left"><b>Nombre de usuario o correo electrónico</b></p>
        </div>
        <div class="col-sm text-left">
            <input type="password" class="form-control my-n1 w-50" id="exampleInputPassword1">
        </div>
        </br>
        <div class="form_group text-left">
            <?php echo form_submit('Recuperar contraseña', 'Recuperar contraseña', "class='btn m-3 btn-outline-warning btn-lg'"); ?>
        </div>
    </div>
</div>