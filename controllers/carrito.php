<?php

session_start();

//PARAMETROS DE LA ENCRIPTACION
$key="andres";
$cod="AES-128-ECB";

$mensaje="";

//SI SE OPRIME EL BOTON AGREGAR
if(isset($_POST['btnAccion']))
{
    switch($_POST['btnAccion'])
    {
        case 'Agregar':
           
           $cantidad=$_POST["cantidad"];
           $canti=openssl_encrypt( $cantidad,$cod,$key ) ;

            if(is_numeric( openssl_decrypt($_POST["id"],$cod,$key) ))
            {
                $ID=openssl_decrypt($_POST["id"],$cod,$key);            
            }
            else { $mensaje.="Error algo pasa con el id "; }


            if(is_string( openssl_decrypt($_POST["nombre"],$cod,$key) ))
            {
                $NOMBRE=openssl_decrypt($_POST["nombre"],$cod,$key);
            
            }
            else { $mensaje.="Error algo pasa con el nombre "; }


            if(is_numeric( openssl_decrypt($canti,$cod,$key) ))
            {
                $CANTIDAD=openssl_decrypt($canti,$cod,$key);
            
            }
            else { $mensaje.="Error algo pasa con la cantidad"; }


            if(is_numeric( openssl_decrypt($_POST["precio"],$cod,$key) ))
            {
                $PRECIO=openssl_decrypt($_POST["precio"],$cod,$key);
                $mensaje.="";
            
            }
            else { $mensaje="Error algo pasa con el precio"; }

            //SI NO EXISTE LA SESSION
        
            
            if(!isset($_SESSION['CARRITO']))
            {
             $producto=array(
               'ID'=>$ID,
               'NOMBRE'=>$NOMBRE,
               'CANTIDAD'=>$CANTIDAD,
               'PRECIO'=>$PRECIO
             );
             $_SESSION["CARRITO"][0]=$producto;
             $mensaje="Producto agregado al carrito";
            }
            //SI EXISTE LA SESSION

            else{
             $idProductos=array_column($_SESSION['CARRITO'],"ID");
             if(in_array($ID,$idProductos)){
               echo "<script> alert('El producto ya ha sido seleccionado'); </script>";

             }else{

                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                  );
                 $_SESSION["CARRITO"][$NumeroProductos]=$producto;
                 //$mensaje=print_r($_SESSION,true);
                 $mensaje="producto agregado el carrito";

            }
        }
         break;

         case "Eliminar":
            if(is_numeric(openssl_decrypt($_POST["id"],$cod,$key))){
                $ID=openssl_decrypt($_POST["id"],$cod,$key);

              
                foreach($_SESSION["CARRITO"] as $indice=>$data)
                {
                    if($data["ID"]==$ID)
                    {
                        echo "<script> alert($indice) </script>";
                      unset($_SESSION["CARRITO"][ $indice]);
                      die(header("location:carro.php"));
                    }
                }

            }
            else{$mensaje.="Lo siento algo salio mal ";}

         break;

    }
}




?>