<?php
include "class/class.php";
include "controllers/carrito.php";
include "template/cabezera.php";


$usuario = new Usuario;
$productos = $usuario->getProductos();




if ($_POST){

    $nombre=$_POST["nombre"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];
    $fecha=date("d")." / ".date("m")." / ".date("Y");


    $total=0;
    $SID=session_id();

    foreach($_SESSION["CARRITO"] as $indice=>$data)
    {

        $total=$total+($data['PRECIO'] * $data['CANTIDAD'] );
       
    }

    $venta=$usuario->Venta($fecha,$SID,$nombre,$telefono,$correo,$total,"pendiente");
    
    $idventa=$venta;

    foreach($_SESSION["CARRITO"] as $indice=>$data)
    {
      $idproducto=$data["ID"];
      $precio=$data["PRECIO"];
      $cantidad=$data["CANTIDAD"];


    

    $guardar=$usuario->DetalleVenta($idventa,$idproducto,$precio,$cantidad);
       
    }

    echo "<script> window.location='pedido.php?pedi=$venta';  </script>";

}


?>
        <div class="row" >
        <div class="col-md-12">
            <a href="index.php">

  
            <img class="mr-2 mt-1 float-right d-lg-none d-md-none d-sm-block " width="45%" src="estilo/img/Logotipo-Asri.png" alt="Logotipo Soluciones Integrales ASRI" title="Logotipo Soluciones Integrales asri">


            </a>

        </div>
    </div>

<div class="container">
<br><br>
<h3> <b>Numero de cotizaci&oacute;n</b>  <?php      echo $_GET["pedi"];
?>  </h3>
<?php if(!empty($_SESSION['CARRITO'])){?>
<br>


<div class="table-responsive">

<table class="table table-light table-bordered ">
    <tbody>
        <tr>
          <th width="50%" class="text-center">Nombre</th>
          <th width="50%" class="text-center">Cantidad</th>
          
        </tr>
      <?php $total=0;?>
       <?php foreach($_SESSION["CARRITO"] as $indice=>$data):?>
        <tr>
          <td width="" class="text-center"> <?php echo $data["NOMBRE"]?> </td>
          <td width=""class="text-center" > <?php echo $data["CANTIDAD"];?> </td>
  

           <?php// $total=$total+($data["PRECIO"]*$data["CANTIDAD"]);?>

        </tr>
      <?php endforeach?>      

        <tr>
        
        <td  > <h4> <b> Cotizaci&oacute;n <?php echo $_GET["pedi"];?></b> </h4> </td>
        <td align="right"><h3> <?php// echo number_format($total,2)?>  </h3></td>
        <td></td>
        </tr>
       <tr>
        <td colspan="5">  

<form method="post" action="controllers/solicitud.php">
<input type="hidden" value="<?php  echo $_GET["pedi"];  ?>" name="cotiza"  >
<div class="alert alert-danger text-center " role="alert">
    <h6 class="text-center"><b>*IMPORTANTE*</b></h6>
<p class="text-center">Tan pronto se solicite su cotizaci&oacute;n nos comunicaremos con usted </p>
</div>

<button type="submit" class="btn btn-success text-center btn-lg btn-block" >Solicitar cotizaci&oacute;n<button>

    
</form>

    

        </td>
        </tr>


    </tbody>
</table>


</div>



<?php } else{ ?>
    <div class="alert alert-success">
        No hay productos  en el carrito....
    </div>
<?php }?>


</div>




<?php 
include "template/pie.php";
?>