<div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
    <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>DETALLE DE VENTA</B></p>
</div>
<div class="container">


    <table id="mytable" class="table table-bordred table-striped table-hover" style="background: white;">

        <thead>
            <th>Id venta</th>
            <th>Id Producto</th>
            <th>cantidad</th>
            <th>precio</th>

        </thead>


        <?php foreach ($detalles as $row) { ?>
            <tr>
                <td> <?php echo $row->id_venta; ?> </td>
                <td> <?php echo $row->nombre; ?> </td>
                <td> <?php echo $row->detalle_cantidad; ?> </td>
                <td> <?php echo $row->detalle_precio; ?> </td>




            <?php } ?>
            </tr>
    </table>
</div>