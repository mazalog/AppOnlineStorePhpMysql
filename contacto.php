<?php 
include "template/cabezera.php";
?>

<div class="row" >
        <div class="col-md-12">
            <a href="index.php">

  
            <img class="mr-2 mt-1 float-right d-lg-none d-md-none d-sm-block " width="30%" src="estilo/img/Logotipo-Asri.png" alt="Logotipo Soluciones Integrales ASRI" title="Logotipo Soluciones Integrales asri">


            </a>

        </div>
    </div>





<div class="row mb-3 ">
    <div class="col-md-12 mt-5">
        <h2 class="text-center color-letra"><b>Contactanos</b> </h2>
    </div>

</div>

<div class="row">
  <div class="col-md-12">
    <div class="container">
    <div class="alert alert-primary">
    <h6 class="text-center mb-3">
      <b>Contactanos para solicitar tu servicio de reparaci&oacute;n,mantenimiento,instalaci&oacute;n o cualquier duda que tengas con respecto a la venta de los 
        productos que ofrecemos
      </b>
    </h6>
    <li class="list-group-item text-center"> <b>0212-237-53.08/0212-234.11.90 </b></li>
  <li class="list-group-item text-center"><b>Whatsapp: 04246620654 </b></li>
  <li class="list-group-item text-center"><b>Correo: solucionesasri@gmail.com</b></li>

    </div> 

 
  
    </div>
  

  </div>
</div>

<div class="row mt-5 mb-5">
  <div class="col-md-1 mt-4"></div>

  <div class="col-md-5 col-lg-5 mt-4 ">

    <div class="col-md-12  p-0   " id="mapid">


    </div>
  </div>






  <div class="col-md-5 col-lg-5 mt-4 rounded mb-5 shadow-sm ">


    <form class="text-center   p-5  " action="controllers/correo.php" method="POST">
      <h3 class="text-center mb-5"> <b>Escr&iacute;benos</b> </h3>
      <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Nombre" name="nombre" maxlength="15">

      <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="Correo electronico" name="correo" maxlength="30">



      <div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Mensaje" name="mensaje" maxlength="160"></textarea>
      </div>


      <button class="btn mt-5  color-busqueda btn-block" type="submit">Enviar mensaje</button>

    </form>

  </div>


<?php
include "template/pie.php";
?>

<script type="text/javascript">
    var mymap = L.map('mapid').setView([10.49305, -66.83349], 25);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);
    var marker = L.marker([10.49305, -66.83349]).addTo(mymap);
  </script>