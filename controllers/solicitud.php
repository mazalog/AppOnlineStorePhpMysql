<?php



$destinatario='solucionesasri@gmail.com';

$asunto="Solicitud de cotizacion ";

$pedido=$_POST["cotiza"];

$header="Enviado desde solucionesintgasri.com";
$mensajeCompleto="Han solicitado una cotizacion por la web \nEl numero de cotizacion es: ". $pedido."\nRevisa la cotizacion en : www.solucionesintgasri.com/login.php  \nposteriormente comunicate con el cliente  ";






mail($destinatario,$asunto,$mensajeCompleto,$header);

echo " <script> window.location='../index.php?soli=soli'; </script> ";









?>