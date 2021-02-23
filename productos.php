<?php
include "class/class.php";
include "controllers/carrito.php";


$usuario = new Usuario;
$productos = $usuario->getProductos();

$key = "andres";
$cod = "AES-128-ECB";

//Paginacion
//Productos por pagina 
$productos_pagina = 12;

//Total de filas en la tabla 
$filas = $usuario->getFilas();
$total_articulos = $filas->rowCount();
$paginas = $total_articulos / 12;
$paginas = ceil($paginas);

if (!$_GET) {

    echo "<script> 
    <!--
    window.location.replace('productos.php?pagina=1');
    //-->
    </script>";
}


//Paginacion
if (!$_GET) {
    header("location:productos.php?pagina=1");
}

if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
    header("location:productos.php?pagina=1");
}
$iniciar = ($_GET['pagina'] - 1) * $productos_pagina;

//Limitar los articulos por pagina

$res_art = $usuario->getLimite($iniciar, $productos_pagina);
include 'template/cabezera.php';

?>

<div class="row" >
        <div class="col-md-12">
            <a href="index.php">

  
            <img class="mr-2 mt-1 float-right d-lg-none d-md-none d-sm-block " width="30%" src="estilo/img/Logotipo-Asri.png" alt="Logotipo Soluciones Integrales ASRI" title="Logotipo Soluciones Integrales asri">


            </a>

        </div>
    </div>

<br> <br>

<div class="container mb-5">

<div class="d-lg-none mt-4">

<div class="accordion " id="accordionExample">
        <div class="card" style="font-size: 11px;">
        <div class="card-header" id="headingTwo">

                <h2 class="mb-0">
                <button class=" text-center btn btn-link btn-block text-left collapsed" style="text-decoration: none;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Categorias 
                    </button>
                </h2>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-1">
                            <div class="list-group ">
                                <a href="busqueda.php?bus=RepuestosCompresoresSemi-Herm&eacute;ticoscopeland"  class=" text-center list-group-item list-group-item-action" style="padding: 1;">
                                    Repuestos compresores semi-herm&eacute;ticos copeland
                                </a>
                                <a href="busqueda.php?bus=RepuestosCompresoresSemi-Herm&eacute;ticoscarrier" class="text-center list-group-item list-group-item-action"style="padding: 1;">Repuestos compresores semi-herm&eacute;ticos carrier</a>
                                <a href="busqueda.php?bus=RepuestosypartesdeRefrigeraci&oacute;n" class="text-center list-group-item list-group-item-action"style="padding: 1;">Repuestos y partes de refrigeraci&oacute;n</a>
                              <a  href="busqueda.php?bus=CompresoresHerm&eacute;ticos"  class="text-center list-group-item list-group-item-action"style="padding: 1;">Compresores herm&eacute;ticos </a>
                               <a  href="busqueda.php?bus=CompresoresSemi-Herm&eacute;ticos" class="text-center list-group-item list-group-item-action"style="padding: 1;" >Compresores semi-herm&eacute;ticos </a>
                               <a  href="busqueda.php?bus=Motores" class="text-center list-group-item list-group-item-action"style="padding: 1;" >Motores </a>

                               <a  href="busqueda.php?bus=EquiposdeAireacondicionado" class="text-center list-group-item list-group-item-action"style="padding: 1;" >Equipos de aire acondicionado  </a>
                               <a href="busqueda.php?bus=EquiposdeRefrigeraci&oacute;"  class="text-center list-group-item list-group-item-action"style="padding: 1;" >Equipos de refrigeraci&eacute; </a>
                               <a  href="busqueda.php?bus=Soldaduras,Cobreybronce"  class="text-center list-group-item list-group-item-action"style="padding: 1;" >Soldadura, Cobre y Bronce </a>
                               <a href=" busqueda.php?bus=Componenteselectricos"  class="text-center list-group-item list-group-item-action"style="padding: 1;" >Componentes electronicos</a>
                               <a href="busqueda.php?bus=Qu&iacute;micos"  class="text-center list-group-item list-group-item-action"style="padding: 1;" >Quimicos </button>
                                <a href="busqueda.php?bus=Herramientasdemedici&oacute;n" class="text-center list-group-item list-group-item-action"style="padding: 1;" >Herramientas de medici&oacute;n</a>
                                <a href="busqueda.php?bus=Ventilaci&oacute;" class="text-center list-group-item list-group-item-action"style="padding: 1;" >Ventilaci&oacute;n</a>


                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

</div>


<br>
    <h5 class="color-letra "> <b>Buscar <svg class="ml-2" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
            </svg> </b> </h5>
    <form method="get" action="busqueda.php">
        <input class="form-control color-alerta " type="search" name="bus" placeholder="Ingresa tu busqueda.......">

    </form>



    <br><br>


    <?php if ($mensaje != "") : ?>
        <div class="alert alert-success">
            <?php echo $mensaje; ?>
            <a href="carro.php" class="badge badge-success">Ver carrito </a>
        </div>
    <?php endif ?>
    <div class="row">
        <div class="col-md-12">
            <h5 class="color-letra"><b>Piezas disponibles</b> ( <?php echo $total_articulos; ?>) </h5>
        </div>
    </div>
    <div class="d-none d-sm-none d-md-block">

        <div class="row">

            <?php foreach ($res_art as $data) : ?>


                <div class="col-md-4 col-lg-3 mt-3">
                    <div class="card-deck">
                        <div class="card ">

                            <a type="button" data-toggle="modal" data-target="#exampleModal" data-iden="<?php echo $data["id"]; ?>" data-nombre=" <?php echo $data["nombre"] ?>  " data-des="<?php echo $data["descripcion"] ?>" class="">

                                <img title="<?php echo $data["nombre"]; ?>" class="imagen card-img-top img-responsive zoom" src=" administrador/<?php echo $data['imagen']; ?>" alt="<?php echo $data["nombre"]; ?> " width="100%" height="180px">
                            </a>

                            <div class="card-body">
                                <p class="text-center" style="height: 60px; overflow:hidden;">
                                <?php echo $data["nombre"]; ?>

                                </p>
                          


                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value=" <?php echo openssl_encrypt($data["id"], $cod, $key) ?> ">
                                    <input type="hidden" name="nombre" id="nombre" value=" <?php echo openssl_encrypt($data["nombre"], $cod, $key) ?> ">
                                    <input type="hidden" name="precio" id="precio" value=" <?php echo openssl_encrypt($data["precio"], $cod, $key) ?> ">
                                    <input class="form-control mb-1 mt-1" type="number" max="20" min="1" name="cantidad" id="cantidad" class="form-control" value="1">
                                    <div class="bg-success mt-1 ">

                                    </div>
                                    <button type="submit" class="btn btn-outline-success btn-block text-black mt-3" name="btnAccion" value="Agregar">Agregar al carrito </button>
                                </form>



                            </div>
                            <div class="card-footer color-alerta">

                                <small class="text-muted"></small>
                            </div>
                        </div>

                    </div>



                </div>
            <?php endforeach ?>



        </div>
    </div>


    <div class="row mt-5 ml-4  d-lg-none d-md-none">
        <?php foreach ($res_art as $data) : ?>
            <div class="row shadow-lg mt-4" style=" width:100%; overflow: hidden;">

                <div class="" style="width: 50%; overflow:hidden ">
                    <a type="button" data-toggle="modal" data-target="#exampleModal" data-iden="<?php echo $data["id"]; ?>" data-nombre=" <?php echo $data["nombre"] ?>  " data-precio="<?php echo openssl_encrypt($data["precio"], $cod, $key) ?>" data-des="<?php echo $data["descripcion"] ?>" class="">

                        <img title="<?php echo $data["nombre"]; ?>" class="imagen card-img-top " src=" administrador/<?php echo $data['imagen']; ?>" alt="<?php echo $data["nombre"]; ?> " width="50%" height="200px">


                    </a>
                </div>
                <div class="p-2 " style="width: 50%;">
                    <h6 class="text-center mt-2 mb-2"> <?php echo $data["nombre"]; ?></h6>

                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value=" <?php echo openssl_encrypt($data["id"], $cod, $key) ?> ">
                        <input type="hidden" name="nombre" id="nombre" value=" <?php echo openssl_encrypt($data["nombre"], $cod, $key) ?> ">
                        <input type="hidden" name="precio" id="precio" value=" <?php echo openssl_encrypt($data["precio"], $cod, $key) ?> ">
                        <input class="form-control mb-1 mt-4" type="number" max="20" min="1" name="cantidad" id="cantidad" class="form-control" value="1">
                        <button type="submit" class="btn btn-sm btn-block btn-outline-success   text-black mt-4" name="btnAccion" value="Agregar">Agregar al carrito </button>

                    </form>

                </div>
            </div>
        <?php endforeach; ?>

    </div>






    <br>
    <br>
    <nav aria-label="Page navigation example ">

        <ul class="pagination">

            <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''  ?> "><a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina'] - 1 ?> ">

                    Anterior</a></li>

            <?php for ($i = 1; $i <= $paginas; $i++) : ?>

                <li class="page-item

   <?php echo $_GET['pagina'] == $i ? 'color-busqueda' : '' ?> "><a class="page-link color-busqueda text-white" href="productos.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>

            <?php endfor ?>

            <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''  ?>">

                <a class="page-link" href="productos.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">siguiente</a>
            </li>

        </ul>
    </nav>

</div>






<?php
include "template/pie.php";
?>
<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget)
        var des = button.data('des')
        var nombre = button.data('nombre')


        var modal = $(this)

        modal.find('.modal-title').text('Descripcion de  ' + nombre)
        modal.find('.des').text('' + des)
        modal.find('.nombre').val(nombre)

    })
</script>