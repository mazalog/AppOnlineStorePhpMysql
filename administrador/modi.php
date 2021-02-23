<?php

include "../class/class.php";
include "../controllers/carrito.php";
include "template/cabezera.php";

$usuario = new Administrador;

if (!isset($_SESSION["USUARIO"])) {
    header("location:../../index.php");
    
    }

//$producto = $usuario->ConsultarPro($id);



//Consultar producto por la barra de busqueda 
if ($_GET) {
    $id = $_GET["id"];
    $producto = $usuario->ConsultarPro($id);
}


?>


    <br>
    <br>

    <div class="container">
        <br>



        <br>
        <h5>Modificar producto</h5>
        <br>
        <table class="table table-light table-bordered rounded shadow-lg">
            <tbody>
                <tr>
                    <td class="text-center" width="45%">Nombre</td>
                    <td class="text-center" width="45%">Descripcion</td>
                    <td class="text-center" width="10%">..</td>


                </tr>
                    <tr>
                        <td class="text-center"> <?php echo  $producto["nombre"] ?> </td>
                        <td class="text-center"> <?php echo $producto["descripcion"]; ?> </td>
                        <td><a href="../controllers/update_delete.php?id=<?php echo  $producto["id"]; ?>" style="text-decoration: none;"> <img src="../../style/img/png/delete.png" alt="" width="25px">Eliminar </a> </td>

                    </tr>
            </tbody>







        </table>
    
        <div class="row">
         
                <div class="col-md-6">
                    <form method="post" action="../controllers/update_delete.php">
                        <br>
                        <br>
                        <h5>Modificar producto</h5>


                        <label for="">Nombre del producto</label>
                        <input type="" name="nombre" class="form-control" value="<?php echo $producto["nombre"]; ?>"  maxlength="49" required>

                        <input type="hidden" name="precio" class="form-control" value="<?php echo $producto["precio"]; ?>" >
                        <label for="">Descripcion</label>

                        <input type="text" name="descripcion" class="form-control" value="<?php echo $producto["descripcion"]; ?>" required>
                     

                        <input type="hidden" name="imagen" value="<?php echo $producto["imagen"]; ?>">
                          
                        <input type="hidden" name="id" value="<?php echo $producto["id"]; ?>">

                        <br> <button class="btn btn-primary" type="submit"> Modificar producto </button>

                    </form>

                </div>

        </div>


    </div>
    <?php 
include "template/pie.php";;
?>