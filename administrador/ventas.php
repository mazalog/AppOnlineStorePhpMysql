<?php

include "../class/class.php";
include "../controllers/carrito.php";
include "template/cabezera.php";

$usuario = new Administrador;
$productos = $usuario->getVentas();

if (!isset($_SESSION["USUARIO"])) {
    header("location:../../index.php");
    
    }
echo "<script>windows.location.replace('location:ventas.php?pagina=1'); ;</script>";


//Paginacion
//Productos por pagina 
$productos_pagina = 12;
//Total de filas en la tabla 
$filas = $usuario->getFilas();
$total_articulos = $filas->rowCount();
$paginas = $total_articulos / 12;
$paginas = ceil($paginas);

?>

<!doctype html>
<html lang="en">


    <br>
    <br>

    <div class="container">
        <br>


        <?php
        //Paginacion
        if (!$_GET) {
                    echo "<script> window.location='ventas.php?pagina=1'; </script>";

          //  header("location:ventas.php?pagina=1");
        }

        if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                    echo "<script> window.location='ventas.php?pagina=1'; </script>";

            //header("location:ventas.php?pagina=1");
        }
        $iniciar = ($_GET['pagina'] - 1) * $productos_pagina;

        //Limitar los articulos por pagina

        $res_art = $usuario->getLimiteVentas($iniciar, $productos_pagina);

        ?>
 <br>
        <h6><b>Buscar cotizaciones </b></h6>
        <form method="get" action=busqueda-venta.php>

            <input class="form-control" type="search" name="bus" placeholder="Buscar....">

        </form>


        <br>

        <h5>Cotizaciones </h5>
        <br>
        <?php if (!empty($res_art)) { ?>

            <div class=" rounded shadow-lg">


        <table class="table table-light table-bordered rounded shadow-lg">
            <tbody>
                <tr>
                    <td class="text-center" width="20%">Cotizacion</td>
                    <td class="text-center" width="20%">Nombre</td>
                    <td class="text-center" width="20%">telefono</td>
                    <td class="text-center" width="20%">Correo</td>
                    <td class="text-center" width="10%">..</td>
                    <td class="text-center" width="10%">..</td>
                </tr>
                <?php foreach ($res_art as $data) : ?>
                    <tr>

                      <td class="text-center" ><b><?php echo $data["id"] ?> </b>  </td>
                       <td class="text-center"> <?php echo $data["nombre"]; ?> </td>
                      <td class="text-center"> <?php echo $data["telefono"]; ?> </td>
                      <td class="text-center"> <?php echo $data["correo"]; ?> </td>
                      <td class="text-center"> <a class="nav-link" href="detalles.php?pedido=<?php echo $data["id"]?>"> Ver</a> </td>


                        <td class="text-center"><a href="../controllers/update_delete-ventas.php?id=<?php echo $data["id"]; ?>" style="text-decoration: none;"> <img src="../../style/img/png/delete.png" alt="" width="25px">Eliminar </a> </td>
                    </tr>
                <?php endforeach ?>
            </tbody>







        </table>
        <!--Paginacion-->
        </div>
<br>





        <nav aria-label="Page navigation example">

            <ul class="pagination">

                <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''  ?> "><a class="page-link" href=" ventas.php?pagina=<?php echo $_GET['pagina'] - 1 ?> ">

                        Anterior</a></li>

                <?php for ($i = 1; $i <= $paginas; $i++) : ?>

                    <li class="page-item

                       <?php echo $_GET['pagina'] == $i ? 'activ' : '' ?> "><a class="page-link color-busqueda text-white" href="ventas.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                <?php endfor ?>

                <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''  ?>">

                    <a class="page-link" href=" ventas.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">siguiente</a>
                </li>

            </ul>
        </nav>


       

    </div>
    <?php } else { ?>
    <div class="alert alert-success">
        No se encuentran resultados.
    </div>
<?php } ?>
<?php 
include "template/pie.php";;
?>