<section>
    <div class="container-fluid text-center border-top border-bottom mt-4 py-5" style="background-color:#ee962a">
        <p style="color: white; font-size:60px" class="animate__animated animate__fadeInDown"><B>LISTADO DE VENTAS</B></p>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-5">
        </div>
        <div class="container my-5">

            <form class="text-left mt-n5" method="POST" action="buscar_venta">
                <label>Fecha inicio =></label><input type="date" name="fecha_inicio" required> 
                </br><label>Fecha fin =></label><input type="date" name="fecha_fin" required></br>
                <button class="btn btn-outline-warning mb-3" type="submit">Buscar</button>
            </form>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">N° Venta</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($las_ventas as $row) { ?>

                        <tr style="font-size: 15px;" class="text-left shadow py-5 my-5">
                            <td style="vertical-align: inherit;"><?php echo $row->venta_id; ?> </td>
                            <td style="vertical-align: inherit;"><?php echo $row->nombre; ?> </td>
                            <td style="vertical-align: inherit;"><?php echo $row->venta_fecha; ?> </td>
                            <td> <a class="btn btn-outline-success" href=" <?php echo base_url("detalle_venta/$row->venta_id") ?>"> Ver detalle </a> </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</section>