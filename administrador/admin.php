<?php


include "../class/class.php";
include "../controllers/carrito.php";
include "template/cabezera.php";
$usuario = new Administrador;
$productos = $usuario->getProductos();


if (!isset($_SESSION["USUARIO"])) {
    header("location:../../index.php");
}



//Capturar las variables del producto a ingresar
if ($_POST) {

    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];
    //$imagen = $_POST["imagen"];
    $imagen1 = $_FILES['imagen1']['name'];
    $guardar1 = $_FILES['imagen1']['tmp_name'];
    $imagen2=$_FILES["imagen2"]["name"];
    $guardar2=$_FILES["imagen2"]["tmp_name"];
    



    if (!file_exists('archivos')) {
        mkdir('archivos', 0777, true);

        if (file_exists('archivos')) {

            if (move_uploaded_file($guardar, 'archivos/' . $imagen)) {
                echo "<script>  alert(' carga exitosa '); </script>";
            }
        } else {
            echo "<script>  alert('Error al crear carpeta '); </script>";
        }
    } else {

        if (file_exists('archivos')) {



            if (move_uploaded_file($guardar, 'archivos/' . $imagen)) {
                echo "<script>  alert('Carga exitosa'); </script>";
            } else {
                echo "<script> alert('error al cargar ');  </script>";
            }
        }
    }


    //$conexion=$usuario->co();
    //$sql="INSERT INTO tblproductos (nombre,precio,categoria,descripcion,imagen) VALUES(?,?,?,?,?) ";
    //   $insert=$conexion->prepare($sql);
    //   $data=array($nombre, $precio,$categoria,$descripcion, $imagen);
    //     $resInsert=$insert->execute($data);

    $imagen = 'archivos/' . $imagen;


    $newProducto = $usuario->IngresarPro($nombre, $precio, $categoria, $descripcion, $imagen);
}



//Paginacion
//Productos por pagina 
$productos_pagina = 12;

//Total de filas en la tabla 
$filas = $usuario->getFilas();
$total_articulos = $filas->rowCount();
$paginas = $total_articulos / 12;
$paginas = ceil($paginas);

?>

<br>
<br>
<div class="container">
    <br>
    <?php
    //Paginacion
    if (!$_GET) {
        echo "<script> window.location='admin.php?pagina=1'; </script>";
        //header("location:admin.php?pagina=1");
    }
    if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                echo "<script> window.location='admin.php?pagina=1'; </script>";

       // header("location:admin.php?pagina=1");
    }
    $iniciar = ($_GET['pagina'] - 1) * $productos_pagina;
    //Limitar los articulos por pagina
    $res_art = $usuario->getLimite($iniciar, $productos_pagina);

    ?>
    <br>
    <h6><b>Buscar producto </b></h6>
    <form method="get" action=busqueda.php>

        <input class="form-control" type="search" name="bus" placeholder="Buscar....">

    </form>


    <br>

    <h5>Gestion de Productos </h5>
    <br>
    <table class="table table-light table-bordered rounded shadow-lg">
        <tbody>
            <tr>
                <td class="text-center" width="45%">Nombre</td>
                <td class="text-center" width="45%">Descripcion</td>
                <td class="text-center" width="5%">..</td>
                <td class="text-center" width="5%">..</td>


            </tr>
            <?php foreach ($res_art as $data) : ?>
                <tr>
                    <td> <?php echo $data["nombre"] ?> </td>
                    <td> <?php echo $data["descripcion"]; ?> </td>
                    <td><a href="../controllers/update_delete.php?id=<?php echo $data["id"]; ?>" style="text-decoration: none
                        ;"> <img src="../../style/img/png/delete.png" alt="" width="25px">Eliminar </a> </td>
                    <td><a href="modi.php?id=<?php echo $data["id"]; ?>" style="text-decoration: none
                        ;"> <img src="../../style/img/png/edit.png" alt="" width="25px">Editar </a> </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <!--Paginacion-->
    <nav aria-label="Page navigation example">

        <ul class="pagination">

            <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''  ?> "><a class="page-link" href=" admin.php?pagina=<?php echo $_GET['pagina'] - 1 ?> ">

                    Anterior</a></li>

            <?php for ($i = 1; $i <= $paginas; $i++) : ?>

                <li class="page-item

                       <?php echo $_GET['pagina'] == $i ? 'activ' : '' ?> "><a class="page-link color-busqueda text-white" href="admin.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>

            <?php endfor ?>

            <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''  ?>">

                <a class="page-link" href=" admin.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">siguiente</a>
            </li>

        </ul>
    </nav>


    <div class="row">
        <div class="col-md-6">


            <form method="post" action="" enctype="multipart/form-data">
                <br>
                <br>
                <h5>Ingresar producto</h5>
                <label for="">Nombre del producto</label>
                <input type="" name="nombre" class="form-control" maxlength="49" required>
                <input type="hidden" name="precio" value="0" class="form-control" ;>
                <label>Categoria</label>
                <select name="categoria" id="" class="form-control" required>
                    <option value="RepuestosCompresoresSemi-Herm&eacute;ticoscopeland">Repuestos para Compresores Semi-Herm&eacute;ticos copeland</option>
                    <option value="RepuestosCompresoresSemi-Herm&eacute;ticoscarrier">Repuestos para Compresores Semi-Herm&eacute;ticos Carrier</option>


              <option value="RepuestosypartesdeRefrigeraci&oacute;n"> Repuestos y partes de Refrigeraci&oacute;n</option>
                <option value="CompresoresHerm&eacute;ticos"> Compresores Herm&eacute;ticos</option>
                <option value="CompresoresSemi-Herm&eacute;ticos">Compresores Semi-Herm&eacute;ticos</option>
                    <option value="Motores">Motores</option>
                    <option value="EquiposdeAireacondicionado">Equipos de Aire acondicionado</option>
                    <option value="EquiposdeRefrigeraci&oacute;">Equipos de Refrigeraci&oacute;n</option>
                    <option value="Soldaduras,Cobreybronce">Soldaduras, Cobre y bronce</option>
                    <option value="Componenteselectricos">Componentes electricos</option>
                    <option value="Qu&iacute;micos">Qu&iacute;micos</option>
                    <option value="Herramientasdemedici&oacute;n">Herramientas de medici&oacute;n</option>
                    <option value="Ventilaci&oacute;">Ventilaci&oacute;n</option>


                </select>
                <label for="">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" maxlength="170" required>
                <label for="">Imagen</label>
                <input type="file" name="imagen" class="form-control" required>

                <br> <button class="btn color-busqueda" type="submit"> Ingresar Producto</button>

            </form>



        </div>


    </div>


</div>

<?php
include "template/pie.php";;
?>