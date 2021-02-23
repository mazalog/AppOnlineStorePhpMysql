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

$buscar=$usuario-> BusquedaPro($nombre);


?>


    <br>
    <br>
    <div class="container">
    <br>
    <br>
        <h6><b>Buscar producto </b></h6>
     <form method="post" action=Busqueda.php>

     <input class="form-control" type="search" name="bus" placeholder="Buscar...." >
         
     </form>
     <br><br>


    <br>
    <h6><b>Resultados</b></h6>
    <table class="table table-light table-bordered rounded shadow-lg">
        <tbody>
            <tr>
            <td class="text-center" width="45%">Nombre</td>
            <td class="text-center" width="45%">Descripcion</td>
                
                    <td class="text-center" width="5%">..</td>
                    <td class="text-center" width="5%">..</td>

            </tr>
            <?php foreach($buscar as $data ):?>
        <tr>
          <td class="text-center" > <?php echo $data["nombre"]?> </td>
          <td  class="text-center" > <?php echo $data["descripcion"];?> </td>
          <td class="text-center"><a href="../controllers/update_delete.php?id=<?php echo $data["id"];?>" style="text-decoration: none;" ><img src="../../style/img/png/delete.png" alt="" width="25px" >Eliminar </a> </td>
          <td class="text-center"><a href="modi.php?id=<?php echo $data["id"];?>"  style="text-decoration: none;"> <img src="../../style/img/png/edit.png" alt="" width="25px" > Editar</a> </td>

        
        </tr>
      <?php endforeach?>      
        </tbody>

    </table> 
    </div>
    <?php 
include "template/pie.php";;
?>