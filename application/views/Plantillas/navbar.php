<header class="hero">
  <div class="container mt-3">
    <div class="row align-items-center border-top border-bottom">
      <div class="col-sm text-left animate__animated animate__fadeInTopLeft">
        <div class="container cont-header">
          <i class="fas fa-phone-square-alt"></i>+3(800)4334-3589
          </br><small class="text-muted">7 Dias a la semana de 9:00 am a 7:00 pm</small>
        </div>
      </div>
      <div class="col-sm text-center" style="letter-spacing: 10px;"><img src="<?php echo base_url() ?>assets/img/B&C_Log.png" class="img-fluid" width="120" alt="Log_Img"><br>
        <h3 style="padding-left: 0px;">BEERS & CHEERS</h3>
      </div>
      <div class="col-sm text-right animate__animated animate__fadeInTopRight sizeicon">
        <div class="container cont-header">
          <a style="color: darkgrey;" href="https://www.facebook.com/cerveceocom/"><i style="color:#6074E1" class="fab fa-facebook-square"></i></a>
          <a style="color: darkgrey;" href="https://www.instagram.com/cerveceocom/"><i style="color: #B3718B;" class="fab fa-instagram-square"></i></a>
          <a style="color: darkgrey;" href="https://twitter.com/cerveceocom"><i style="color: #85CEED;" class="fab fa-twitter-square"></i></a>
          <a style="color: darkgrey;" href="https://wa.link/8zgzz1"><i style="color: #A2ED85;" class="fab fa-whatsapp-square"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- NAVBAR-->

  <nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse justify-content-center navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index'); ?>">Inicio<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('quienes_somos'); ?>">Sobre Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('contacto'); ?>">Contacto</a>
        </li>

        <?php if ($this->session->userdata('login')) { ?>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('catalogo/1'); ?>">Catálogo</a>
        </li>
        <?php } else { ?>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('catalogo/0'); ?>">Catálogo</a>
        </li>
        <?php } ?>



        <?php if ($this->session->userdata('login')) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> <?php echo $this->session->userdata('nombre'); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo base_url('ver_carrito') ?>"><i class="fas fa-shopping-cart"></i> Tu carrito</a>
              <a class="dropdown-item" href="<?php echo base_url('salir') ?>"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
            </div>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('registrar') ?>">Registrarse</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('inicio_sesion') ?>">Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
</header>