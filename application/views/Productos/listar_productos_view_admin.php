<div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
    <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>CATALOGO DE PRODUCTOS</B></p>
</div>
<div class="row justify-content-center">
    <div class="col-sm-2 text-center my-3 py-3">
        <div class="container shadow ml-4">
            <h4 class="text-muted">Categorías</h4>
            <nav class="nav flex-column">
                <a class="nav-link category_item border-top" style="color: #873e23;" href="#" category="all">All Products</a>
                <a class="nav-link category_item border-top" style="color: #873e23;" href="#" category="cerv_laggers">Cervezas Alemanas</a>
                <a class="nav-link category_item border-top" style="color: #873e23;" href="#" category="cerv_alemanas">Cervezas Laggers</a>
                <a class="nav-link category_item border-top" style="color: #873e23;" href="#" category="cerv_combos">SixPacks</a>
            </nav>
        </div>
    </div>

    <div class="col-sm">
        <div class="container   my-3">
            <div class="container">
                <div class="row mb-3">
                    <?php foreach ($producto as $row) { ?>

                        <?php if ($row->categoria == 1) { ?>
                            <div class="card align-items-center product-item my-2 mx-2" category="cerv_alemanas" style="width: 15rem;">
                                <img src="<?php echo base_url('/upload/') . $row->imagen ?>" class="card-img-top">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $row->nombre; ?></h5>
                                    <p><strong>$<?php echo $row->precio; ?></strong></p>
                                    <p>Stock <?php echo $row->stock ?></p>
                                    <p><?php echo $row->descripcion ?></p>
                                    <?php
                                    if ($this->session->userdata('login')) {
                                        echo form_open('carrito_controller/agregar_carrito');
                                        echo form_hidden('id', $row->id_producto);
                                        echo form_hidden('nombre', $row->nombre);
                                        echo form_hidden('precio', $row->precio);
                                        echo form_close();
                                    } ?>
                                </div>
                            </div>
                        <?php } ?>


                        <?php if ($row->categoria == 2) { ?>
                            <div class="card align-items-center product-item my-2 mx-2" category="cerv_laggers" style="width: 15rem;">
                                <img src="<?php echo base_url('/upload/') . $row->imagen ?>" class="card-img-top">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $row->nombre; ?></h5>
                                    <p><strong>$<?php echo $row->precio; ?></strong></p>
                                    <p>Stock <?php echo $row->stock ?></p>
                                    <p><?php echo $row->descripcion ?></p>
                                    <?php
                                    if ($this->session->userdata('login')) {
                                        echo form_open('carrito_controller/agregar_carrito');
                                        echo form_hidden('id', $row->id_producto);
                                        echo form_hidden('nombre', $row->nombre);
                                        echo form_hidden('precio', $row->precio);
                                        echo form_close();
                                    } ?>
                                </div>
                            </div>
                        <?php } ?>


                        <?php if ($row->categoria == 3) { ?>
                            <div class="card align-items-center product-item my-3 mx-2" category="cerv_combos" style="width: 15rem;">
                                <img src="<?php echo base_url('/upload/') . $row->imagen ?>" class="card-img-top">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $row->nombre; ?></h5>
                                    <p><strong>$<?php echo $row->precio; ?></strong></p>
                                    <p>Stock <?php echo $row->stock ?></p>
                                    <p><?php echo $row->descripcion ?></p>
                                    <?php
                                    if ($this->session->userdata('login')) {
                                        echo form_open('carrito_controller/agregar_carrito');
                                        echo form_hidden('id', $row->id_producto);
                                        echo form_hidden('nombre', $row->nombre);
                                        echo form_hidden('precio', $row->precio);
                                        echo form_close();
                                    } ?>
                                </div>
                            </div>
                        <?php } ?>






                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>