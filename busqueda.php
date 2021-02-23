<?php
include "class/class.php";
include "controllers/carrito.php";
include 'template/cabezera.php';


$usuario = new Administrador;
$productos = $usuario->getProductos();

$key = "andres";
$cod = "AES-128-ECB";

if ($_GET) {
    $busqueda = $_GET["bus"];
    $nombre = '%' . $busqueda . '%';


    $buscar = $usuario->BusquedaPro($nombre);
}



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
<h5 class="color-letra"> <b>Buscar</b> </h5>
<form method="get" action="busqueda.php">
    <input class="form-control color-alerta "  type="search" name="bus" placeholder="Ingresa tu busqueda.......">

</form>

<br>

<?php if ($mensaje != "") : ?>
    <div class="alert alert-success">
        <?php echo $mensaje; ?>
        <a href="mostrarCarro.php" class="badge badge-success">Ver carrito </a>
    </div>
<?php endif ?>

<h5 class="color-letra"><b>Resultados</b></h5>

<?php if (!empty($buscar)) { ?>

    <div class=" d-none d-sm-none d-md-block">

    <div class="row">

        <?php foreach ($buscar as $data) : ?>
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
        <?php foreach ($buscar as $data) : ?>
            <div class="row shadow-lg mt-4 " style=" width:100%; overflow: hidden;">

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


<div style="height: 150px;"></div>




<?php } else { ?>
    <div class="alert alert-success">
        No se encuentran resultados.
    </div>
    <div style="height: 300px;"></div>
<?php } ?>


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