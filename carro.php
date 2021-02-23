<?php
include "class/class.php";
include "controllers/carrito.php";
include "template/cabezera.php";
$usuario = new Usuario;
$productos = $usuario->getProductos();
?>
        <div class="row" >
        <div class="col-md-12">
            <a href="index.php">

  
            <img class="mr-2 mt-1 float-right d-lg-none d-md-none d-sm-block " width="30%" src="estilo/img/Logotipo-Asri.png" alt="Logotipo Soluciones Integrales ASRI" title="Logotipo Soluciones Integrales asri">


            </a>

        </div>
    </div>
<div class="container">

    <br><br>
    <h3> <b>Lista del carrito</b> </h3>
    <?php if (!empty($_SESSION['CARRITO'])) { ?>
        <br>

        <div class="row mb-3">

        <div class="col md-6">
            <table class="table  table-light table-bordered  rounded shadow-lg">
                <tbody>
                    <tr>
                        <th width="30%">Nombre</th>
                        <th width="30%" class="text-center">Cantidad</th>

                        <th width="10%" class="text-center">..</th>
                    </tr>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION["CARRITO"] as $indice => $data) : ?>
                        <tr>
                            <td width=""> <?php echo $data["NOMBRE"] ?> </td>
                            <td width="" class="text-center"> <?php echo $data["CANTIDAD"]; ?> </td>



                            <td width="" class="text-center">
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value=" <?php echo openssl_encrypt($data['ID'], $cod, $key); ?> ">

                                    <button class="btn btn-danger text-center" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                                </form>
                            </td>
                            <?php $total = $total + ($data["PRECIO"] * $data["CANTIDAD"]); ?>

                        </tr>
                    <?php endforeach ?>



                </tbody>
            </table>

        </div>
        <div class="col-md-6 mb-5">

                            <form method="post" action="pedido.php">

                                <div class="alert color-alerta " role="alert">
                                    <h5 class=""> Solicita la cotizaci&oacute;n de los productos ingresados en el carrito</h5>
                                    <div class="alert  alert-warning mt-2" role="alert">
                                        <div class="text-center">
                                            <h6>
                                                <b>*IMPORTANTE*</b>
                                            </h6>
                                        </div>
                                        <p class="text-justify" style="font-size: 13px;"> En cuanto se completen los siguientes datos se procesara a solicitar la cotizaci&oacute;n de los productos ingresados en el carrito , tan pronto se emita
                                            la solicitud de cotizaci&oacute;n un vendedor se comunicara con usted.

                                        </p>

                                        <p class="text-justify"  style="font-size: 13px;">Como otra opci&oacute;n nos puedes enviar el numero de cotizaci&oacute;n por alguno de los medios de contacto para posteriormente ser atendido igualmente.

                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="my-input">Nombre</label>
                                        <input id="my-input"  class="form-control" max="20" maxlength="20" type="text" name="nombre" required>

                                        <label for="my-input">Telefono </label>
                                        <input id="my-input"  class="form-control" min="11" minlength="11" max="11" maxlength="11" type="text" name="telefono" required>

                                        <label for="my-input">Correo de contaco</label>
                                        <input id="my-input"  class="form-control" type="email" maxlength="30" name="correo" required>
                                    </div>
                                </div>

                                <button class="btn btn-success text-center btn-lg btn-block" type="submit" name="btnAccion" value="proceder">Proceder con la cotizacion</button>


                            </form>



            

        </div>


        </div>


    <?php } else { ?>
        <div class="alert alert-success">
            No hay productos en el carrito....
        </div>
    <div style="height: 450px;"></div>

    <?php } ?>



</div>


  
<?php
include "template/pie.php";
?>