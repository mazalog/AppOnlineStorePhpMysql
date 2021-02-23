<?php


include "../class/class.php";
include "../controllers/carrito.php";
include "template/cabezera.php";

$usuario = new Administrador;
$id=$_GET["pedido"];
if (!isset($_SESSION["USUARIO"])) {
    header("location:../../index.php");
    
    }
$productos = $usuario->Consultarventa($id);


?>

    <br>
    <br>

    <div class="container">
        <br>
        <br>

        <h5>Detalle cotizacion <b><?php echo $_GET["pedido"]?>  </b> </h5>
        <br>
        <table class="table table-light table-bordered rounded shadow-lg">
            <tbody>
                <tr>
                    <td class="text-center" width="50%">Producto</td>
                    <td class="text-center" width="50%">Cantidad</td>
                  



                </tr>
                <?php foreach ($productos as $data) : ?>

                    <tr>


                     <td class="text-center" >
                         
                     <b>
                    <?php
                    $idproducto= $data["idproducto"];  
                    $pro=$usuario->ConsultarPro($idproducto);

                     echo $pro["nombre"];  
                     ?>  
                     </b>  
                      </td>
                      <td class="text-center"> <?php echo $data["cantidad"]; ?> </td>



                    </tr>

                <?php endforeach ?>
            </tbody>

        </table>
        <!--Paginacion-->

      

       

    </div>
    <?php 
include "template/pie.php";;
?>