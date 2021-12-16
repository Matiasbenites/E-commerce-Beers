<div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
    <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>CARRITO DE COMPRAS</B></p>
  </div>
</br>
<h2 class="text-center"><?php echo $message ?></h2>

<table id="mytable" class="table table-bordred table">
    <?php if ($cart = $this->cart->contents()) : ?>
        <thead>
            <th>N° item</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Acción</th>
        </thead>
        <tbody>
            <?php
            $i = 1;

            foreach ($cart as $item) : ?>
                <tr>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $item['name']; ?>
                    </td>
                    <td>
                        <?php echo $this->cart->format_number($item['price'], 2); ?>
                    </td>
                    <td>
                        <?php echo $item['qty']; ?>
                    </td>
                    <td>
                        <?php echo $this->cart->format_number($item['subtotal'], 2); ?>
                    </td>
                    <td>
                        <?php echo anchor('Carrito_controller/borrar/' . $item['rowid'], 'Eliminar'); ?>
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td>
                    Total Compra: $<?php echo number_format($this->cart->total(), 2); ?>
                </td>
                <td>
                    <a href="<?php echo base_url('Ventas_controller/guardar_venta'); ?>" class="btn btn-success py-3 shadow" role="button">Confirmar compra</a>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-success" onclick="limpiar_carrito()">Vaciar Carrito</button>
                    <a href="<?php echo base_url('catalogo/1'); ?>" class="btn btn-outline-warning" role="button">Continuar comprando</a>

                </td>
            </tr>
        <?php endif; ?>

        </tbody>
</table>

<script>
    function limpiar_carrito() {
        var result = confirm('Desea vaciar el carrito?');
        if (result) {
            window.location = "<?php echo base_url(); ?>Carrito_controller/borrar/all";
        } else {
            return false;
        }
    }
</script>