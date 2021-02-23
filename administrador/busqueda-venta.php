<?php


include "../class/class.php";
include "../controllers/carrito.php";
include "template/cabezera.php";

$usuario = new Administrador;
$productos = $usuario->getProductos();

if (!isset($_SESSION["USUARIO"])) {
    header("location:../../index.php");
    
    }
$busqueda=$_GET["bus"];
$nombre='%'.$busqueda.'%';

$buscar=$usuario-> BusquedaVenta($nombre);




?>


    <br>
    <br>
    <div class="container">
    <br>
    <br>
        <h6><b>Buscar ventas</b></h6>
     <form method="get" action=Busqueda-venta.php>

     <input class="form-control" type="search" name="bus" placeholder="Buscar...." >
         
     </form>
     <br>


    <h6><b>Resultados</b></h6><br>
    <?php if (!empty($buscar)) { ?>

    <table class="table table-light table-bordered rounded shadow-lg">
        <tbody>
            <tr>
            <td class="text-center" width="20%">Pedido</td>
                    <td class="text-center" width="20%">Nombre</td>
                    <td class="text-center" width="20%">telefono</td>
                    <td class="text-center" width="20%">Correo</td>
                    <td class="text-center" width="10%">..</td>
                    <td class="text-center" width="10%">..</td>


            </tr>
            <?php foreach($buscar as $data ):?>
        <tr>
        <td class="text-center" ><b><?php echo $data["id"] ?> </b>  </td>
                       <td class="text-center"> <?php echo $data["nombre"]; ?> </td>
                      <td class="text-center"> <?php echo $data["telefono"]; ?> </td>
                      <td class="text-center"> <?php echo $data["correo"]; ?> </td>
                      <td class="text-center"> <a class="nav-link" href="detalles.php?pedido=<?php echo $data["id"]?>"> Ver</a> </td>


                        <td class="text-center"><a href="../../controllers/update_delete-ventas.php?id=<?php echo $data["id"]; ?>" style="text-decoration: none;"> <img src="../../style/img/png/delete.png" alt="" width="25px">Eliminar </a> </td>

        
        </tr>
      <?php endforeach?>      
        </tbody>

    </table> 
    <?php } else { ?>
    <div class="alert alert-success">
        No se encuentran resultados.
    </div>
<?php } ?>
    </div>
    <?php 
include "template/pie.php";;
?>