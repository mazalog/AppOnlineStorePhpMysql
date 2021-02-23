<?php
include "class/class.php";
include "controllers/carrito.php";

$usuario = new Usuario;
$productos = $usuario->getProductos();

$key = "andres";
$cod = "AES-128-ECB";

//Paginacion
//Productos por pagina 
$productos_pagina = 4;

//Total de filas en la tabla 
$filas = $usuario->getFilas();
$total_articulos = $filas->rowCount();
$paginas = $total_articulos / 4;
$paginas = ceil($paginas);
$iniciar = (1 - 1) * $productos_pagina;

//Limitar los articulos por pagina

$res_art = $usuario->getLimite($iniciar, $productos_pagina);

if ($_GET) {
    echo " <script>   alert('Gracias, en momentos nos comunicaremos con usted. ');    </script>  ";
    echo "<script> window.location='index.php';</script> ";
    session_destroy();
}

include "template/cabezera.php";
?>



<div class="fondo">
    <div class="row" >
        <div class="col-md-12">
            <a href="index.php">

  
            <img class="mr-2 mt-1 float-right d-lg-none d-md-none d-sm-block logo " width="45%" src="estilo/img/Logotipo-Asri.png" alt="Logotipo Soluciones Integrales ASRI" title="Logotipo Soluciones Integrales asri">


            </a>

        </div>
    </div>

    <div class="row p-5">

        <div class="col-lg-12 " style="z-index: 1;">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="row mt-5">
                            <div class="col-sm-1 col-md-1 col-lg-1"></div>
                            <div class="col-sm-3 col-md-3 col-lg-4">
                                <img src="estilo/img/Compresores-semihermeticos-.png" width="100%" class="d-block w-100 mt-5" alt="...">
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-5 mt-5 ">

                                <h2 class="text-center " style="color:#06619e;" ><b> Variedad en compresores  

                                    </b></h2>
                                <h2 class="text-center" style="color:#06619e;" > <b>Semiherm&eacute;ticos</b></h2>

                                <div class="mt-5">
                                    <h5 class="text-left"><b>Compresores semiherm&eacute;ticos</b></h5>
                                    <h5 class="text-left"><b>de la mejor calidad y precio</b></h5>
                                    <h5 class="text-left"><b> del mercado</b></h5>
                                </div>


                                <div class="mt-5">
                                    <a class="btn btn-md   bg-success text-white" href="busqueda.php?bus=carrier">Ver m&aacute;s </a>
                                    <a class="btn   btn-md  color-busqueda text-white" href="productos.php"> <span>Buscar otro producto</span> </a>
                                </div>

                            </div>

                            <div class="col-sm-2 col-md-2 col-lg-2"></div>


                        </div>


                    </div>
                    <div class="carousel-item">

                    <div class="row mt-5">
                            <div class="col-sm-1 col-md-1 col-lg-1"></div>
                            <div class="col-sm-3 col-md-3 col-lg-4">
                                <img src="estilo/img/Repuestos-para-compresores2.png" width="100%" class="d-block w-100 mt-5" alt="..." alt="Repuestos para refrigeracion" title="Repuestos para refrigeracion">
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-5 mt-5 " >

                                <h2 class="text-center "style="color:#06619e;" ><b>La mejor calidad en repuestos</b></h2>
                                <h2 class="text-center "style="color:#06619e;"><b> de refrigeraci&oacute;n</b></h2>


                                <div class="mt-5">
                                    <h5 class="text-left" style="font-weight:10px; "><b>Gran variedad de repuestos</b></h5>
                                    <h5 class="text-left"><b>de refrigeraci&oacute;n domestica e industrial  </b> </h5>
                                    <h5 class="text-left"><b>tenemos lo que necesitas </b></h5>
                                </div>


                                <div class="mt-5">
                                    <a class="btn btn-md   bg-success text-white" href="busqueda.php?bus=carrier">Ver m&aacute;s </a>
                                    <a class="btn   btn-md  color-busqueda text-white" href="productos.php"> <span>Buscar otro producto</span> </a>
                                </div>

                            </div>

                            <div class="col-sm-2 col-md-2 col-lg-2"></div>


                        </div>

                    </div>
            
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="" aria-hidden="true"><b><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                            </svg></b></span>
                    <span class="sr-only">Previos</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="" style=" color:black;" aria-hidden="true"><b><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-compact-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z" />
                            </svg></b></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>

</div>


<div>

    <div class="row mt-5">
        <div class="col-md-1">
        </div>
        <div class="col-md-11 col-lg-11">
            <h4 class="text-left ml-3 color-letra"><b>Ultimas piezas</b><span class="ml-2" style="font-size: 13px; "> <a href="productos.php" style="text-decoration: none;">Ver todas las piezas</a> </span></h4>
        </div>
    </div>

    <div class="row p-4 mt-3">
        <div class="container">
            <div class="d-none d-sm-none d-md-block">
                <div class="row">
                    <?php foreach ($res_art as $data) : ?>

                        <div class="col-md-4 col-lg-3 ">
                            <div class="card-deck">
                                <div class="card ">

                                    <a type="button" data-toggle="modal" data-target="#exampleModal" data-iden="<?php echo $data["id"]; ?>" data-nombre=" <?php echo $data["nombre"] ?>  " data-des="<?php echo $data["descripcion"] ?>" class="">

                                        <img title="<?php echo $data["nombre"]; ?>" class="card-img-top img-responsive zoom imagen" src=" administrador/<?php echo $data['imagen']; ?>" alt="<?php echo $data["nombre"]; ?> " width="100%" height="180px">


                                    </a>

                                    <div class="card-body">
                                        <div style="height: 60px; overflow:hidden;">
                                            <p class="text-center">
                                                <?php echo $data["nombre"]; ?>

                                            </p>

                                        </div>


                                        <form action="" method="post">
                                            <input type="hidden" name="id" id="id" value=" <?php echo openssl_encrypt($data["id"], $cod, $key) ?> ">
                                            <input type="hidden" name="nombre" id="nombre" value=" <?php echo openssl_encrypt($data["nombre"], $cod, $key) ?> ">
                                            <input type="hidden" name="precio" id="precio" value=" <?php echo openssl_encrypt($data["precio"], $cod, $key) ?> ">
                                            <input class="form-control mb-1 mt-1" type="number" max="20" min="1" name="cantidad" id="cantidad" class="form-control" value="1">
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



            <div class="row mt-5 ml-4 d-lg-none d-md-none">
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
                                <button type="submit" class="btn btn-sm btn-block  btn-outline-success   text-black mt-4" name="btnAccion" value="Agregar">Agregar al carrito </button>

                            </form>

                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>

    </div>

</div>


<div class="row mt-5 mb-5">

    <div class="col-md-12">


        <h4 class="text-center  color-letra ">
            <b>M&aacute;s soluciones</b>
        </h4>
    </div>
</div>

<div class="row mt-5 ">
    <div class="col-md-12">

        <div class="card-group">

            <div class="card">
            <a name="reparar"></a>

                <a href="contacto.php" style="text-decoration: none; color:black;">


                    <img src="estilo/img/reparacion1.jpeg" class="card-img-top massolu" height="350px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Reparaci&oacute;n de compresores </h5>
                        <p class="card-text text-center">En Soluciones Integrales  ASRI pensamos siempre en el beneficio del cliente, por ello contamos con
                            servicios para generar soluciones adecuadas a cualquier necesidad poseemos un taller con personal tecnico
                            altamente capacitado para reparar tu compresor Semi-Herm&eacute;tico. ¡Contactanos! te esperamos

                        </p>
                        <p class="card-text"><small class="text-muted">Ultima actualizaci&oacute;n hace una semana</small></p>
                    </div>
                </a>

            </div>


            <div class="card">
            <a name="mantenimiento"></a>

                <a href="contacto.php" style="text-decoration: none; color:black;">

                    <img src="estilo/img/mantenimiento-aire-acondicionados.jpg " class="card-img-top massolu" alt="Mantenimiento de equipos residenciales e industriales" title="Mantenimiento de equipos residenciales e industriales" height="350px">
                    <div class="card-body">

                        <h5 class="card-title text-center"> Mantenimiento de equipos residenciales e industriales</h5>
                        <p class="card-text text-center">
                            Si no hay presencia de un correcto mantenimiento no habra un buen margen en el desempeño de tus equipos el mantenimiento debe ser
                            la prioridad para cualquier industria. En Soluciones Integrales ASRI te ayudamos de manera optima a alargar la vida de tus equipos de refrigeraci&oacute;n
                            ya sean residenciales e industriales. Contactanos te aseguramos que con nosotros te ahorraras muchos problemas

                        </p>
                        <p class="card-text"><small class="text-muted">Ultima actualizaci&oacute;n hace una semana</small></p>
                    </div>
                </a>
            </div>
            <div class="card">
            <a name="instalar"></a>

                <a href="contacto.php" style="text-decoration: none; color:black;">

                    <img src="estilo/img/Refrigeracion-industrial.jpg" class="card-img-top massolu" title="Refrigeracion-industrial" alt="Refrigeracion-industrial" height="350px">
                    <div class="card-body">

                        <h5 class="card-title text-center"> Instalaci&oacute;n de equipos residenciales e industriales </h5>

                        <p class="card-text text-center">
                            El personal tecnico de soluciones Integrales ASRI, es el personal indicado para llevar un correcta instalaci&oacute;n
                            de equipos de refrigeraci&oacute;n residenciales e industriales con el fin de alcanzar el confort en cualquier tipo
                            de edificio. Te ofrecemos lo mejor, la proyeccion y asesoramiento en la elecci&oacute;n de los equipos para garantizar la mejor
                            eficiencia en la instalaci&oacute;n

                        </p>



                        <p class="card-text"><small class="text-muted">Ultima actualizaci&oacute;n hace una semana</small></p>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>

<div class="row mt-5">

    <div class="col-md-12">

        <h4 class="text-center mt-2 color-letra ">
            <b> Marcas</b>
        </h4>
    </div>
</div>

<div class="row mt-5 mb-5 ">




    <div class="col-md-6 col-lg-3">
        <a href="busqueda.php?bus=lg">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-lg.png" width="100%" alt="Aires LG">

        </a>
    </div>

    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=trane">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-trane.png" width="100%" alt="Aires Trane">

        </a>
    </div>


    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=carrier">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-carrier.png" width="100%" alt="Aires Carrier">

        </a>
    </div>


    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=premium">
            <img class="img-fluid imagen " src="estilo/img/marcas/Logo-premium.png" width="100%" alt="Aires Premium ">

        </a>
    </div>


    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=copeland">
            <img class="img-fluid imagen " src="estilo/img/marcas/Logo-copeland.png" width="100%" alt="Aires copeland">

        </a>
    </div>


    <div class="col-md-6 col-lg-3">
        <a href="busqueda.php?bus=innovar">
            <img class="img-fluid imagen " src="estilo/img/marcas/Logo-innovar.png" width="100%" alt="Aires innovar">

        </a>
    </div>

    <div class=" col-md-6 col-lg-3">
        <a href="busqueda.php?bus=midea">
            <img class="img-fluid imagen " src="estilo/img/marcas/Logo-Midea.png" width="100%" alt=" Aires midea">

        </a>
    </div>

    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=york">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-york.png" width="100%" alt=" Aires york">

        </a>
    </div>
    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=carlyle">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-carlyle.png" width="100%" alt="Logo Carlyle">

        </a>
    </div>
    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=bitzer">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-bitzer.png" width="100%" alt="Logo Bitzer">

        </a>
    </div>
    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=danfoss">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-danfoss.png" width="100%" alt="Logo danfoss">

        </a>
    </div>
    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=johson">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-Johson.png" width="100%" alt="Logo johson">

        </a>
    </div>
    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=ranco">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-ranco.png" width="100%" alt="Logo ranco">

        </a>
    </div>
      <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=samsung">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-samsung.png" width="100%" alt="Logo samsung">

        </a>
    </div>
    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=parker">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-parker.png" width="100%" alt="Logo parker">

        </a>
    </div>
    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=bristol">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-bristol.png" width="100%" alt="Logo bristol">

        </a>
    </div>
    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=sporlan">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-sporlan.png" width="100%" alt="Logo sporlan">

        </a>
    </div>
    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=tronic">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-tronic.png" width="100%" alt="Logo tronic">

        </a>
    </div>
    <div class="col-md-6 col-lg-3 ">
        <a href="busqueda.php?bus=khaled">
            <img class="img-fluid  imagen" src="estilo/img/marcas/Logo-khaled.png" width="100%" alt="Logo khaled">

        </a>
    </div>



</div>


</section>


<?php

include "template/pie.php"; ?>


<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget)
        var des = button.data('des')
        var nombre = button.data('nombre')
        var precio = button.data('precio')
        var iden = button.data('iden')


        var modal = $(this)

        modal.find('.iden').val(iden)
        modal.find('.modal-title').text('' + nombre)
        modal.find('.nombre').val(nombre)
        modal.find('.precio').val(precio)
        modal.find('.des').text('' + des)



    })
</script>