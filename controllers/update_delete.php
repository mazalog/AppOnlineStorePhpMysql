<?php

include "../class/class.php";


$usuario=new Administrador;


if($_POST){


    $id=$_POST["id"];
    $nombre=$_POST["nombre"];
    $precio=$_POST["precio"];
    $descripcion=$_POST["descripcion"];
    $imagen=$_POST["imagen"];

    $newProducto=$usuario->ModificarPro($id,$nombre,$precio,$descripcion,$imagen);
    
     header("location:../administrador/admin.php");
}

if($_GET)
{
 
    $id=$_GET["id"];
     
    $eliminar=$usuario->EliminarPro($id);

    header("location:../administrador/admin.php");

}