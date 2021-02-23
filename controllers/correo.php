<?php


$destinatario='solucionesasri@gmail.com';

$nombre=$_POST["nombre"];
$asunto="Contacto por web";
$mensaje=$_POST["mensaje"];
$email=$_POST["correo"];
$header="Enviado desde solucionesintgasri.com";
$mensajeCompleto= $mensaje . "\nAtentamente: " . $nombre."\nCorreo de contacto: ".$email;


mail($destinatario,$asunto,$mensajeCompleto,$header);
echo " <script> window.location='../index.php'; </script> ";
?>