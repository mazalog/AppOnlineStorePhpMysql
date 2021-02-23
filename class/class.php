<?php

class Conexion
{

 
    private $link= "mysql:host=localhost;dbname=tienda";
    private $usuario ="root";
    private $pass="";
    public $pdo;
    public $key="andres";
    public $cod="AES-128-ECB";


     public function __construct()
     {
       try{
           $this->pdo=new PDO($this->link,$this->usuario,$this->pass);
        }    
           
       catch( PDOException  $e)
       {
        echo "Error".$e->getMessage()."<br>";
        die();
        }
     }
     public function co()
     {
         $pd=$this->pdo=new PDO($this->link,$this->usuario,$this->pass);
         return $pd;
     }

     public function Connect()
     {
         return $this->pdo;
     }
    

}

class Usuario extends Conexion
{
     public $nombre;
    public $descripcion;
    public $precio;
    public $imagen;
     public $conexion;
      
     public function __construct()
     {
         $this->conexion=new Conexion;
         $this->conexion=$this->conexion->Connect();
     }

     //Ver productos 

     public function getProductos()
     {
         
        $sql="SELECT * FROM tblproductos  ORDER BY `tblproductos`.`id` DESC ";
        $execute=$this->conexion->query($sql);
        $request=$execute->fetchAll(PDO::FETCH_ASSOC);
        return $request;

     }

     public function getFilas()
    {
        $sql = "SELECT * FROM tblproductos ";
        $query = $this->conexion->prepare($sql);
        $query->execute();
        return $query;
    }


    //procesar pedido 

      
    public function Venta(string $fecha,string $clavetran,string $nombre,string $telefono,string $correo,int $total, string $status )
    { 
     $this->fecha=$fecha;
     $this->clavetran=$clavetran;
     $this->nombre=$nombre;
     $this->telefono=$telefono;
     $this->correo=$correo;
     $this->total=$total;
     $this->status=$status;


        $sql="INSERT INTO tblventas (fecha,clavetran,nombre,telefono,correo,total,status) VALUES(?,?,?,?,?,?,?) ";
        $insert=$this->conexion->prepare($sql);
        $data=array($this->fecha= $fecha,$this->$clavetran=$clavetran,$this->nombre= $nombre,$this->telefono= $telefono,$this->correo=$correo,$this->total= $total,$this->status= $status);
        $resInsert=$insert->execute($data);
        $idventa=$this->conexion->lastInsertId();
        return $idventa;


    }


      //guardar venta  

      
        public function DetalleVenta(int $idventa,int $idproducto,int $preciounitario,int $cantidad )
        { 
         $this->idventa=$idventa;
         $this->idproducto=$idproducto;
         $this->preciounitario=$preciounitario;
         $this->cantidad=$cantidad;
        

        

            $sql="INSERT INTO tbldetalles (idventa,idproducto,preciounitario,cantidad) VALUES(?,?,?,?) ";
            $insert=$this->conexion->prepare($sql);
            $data=array($this->idventa=$idventa,$this->idproducto= $idproducto,$this->preciounitario= $preciounitario,$this->$cantidad=$cantidad);
            $resInsert=$insert->execute($data);
            return $resInsert;
}

 //enviar pago 

      
 public function pago(string $medio,int $referencia,string $fecha,int $monto,int $pedido )
 { 
  $this->medio=$medio;
  $this->referencia=$referencia;
  $this->fecha=$fecha;
  $this->monto=$monto;
  $this->pedido=$pedido;

  $sql="INSERT INTO tblpagos (medio,referencia,fecha,monto,pedido) VALUES(?,?,?,?,?)";
  $insert=$this->conexion->prepare($sql);
  $data=array(
  $this->medio=$medio,
  $this->referencia=$referencia,
  $this->fecha=$fecha,
  $this->monto=$monto,
  $this->pedido=$pedido
  );
  $resInsert=$insert->execute($data);
  return $resInsert;

}


//verificar que el pedido este en la base de datos 
public function ConsultarPedido($id)
{
    $this->id=$id;

$sql="SELECT * FROM tblventas WHERE id=?";
     
 $consul = $this->conexion->prepare($sql);
 $consul->execute(array($id));
 $request=$consul->fetch();
 return $request;
}





    //limitar los articulos por pagina 

    public function getLimite($iniciar, $articulos_pagina)
    {
        $sql_articulos = 'SELECT * FROM tblproductos 
         ORDER BY `tblproductos`.`id` DESC LIMIT :iniciar,:narticulos';
         
        $sentencia_articulos = $this->conexion->prepare($sql_articulos);
        $sentencia_articulos->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
        $sentencia_articulos->bindParam(':narticulos', $articulos_pagina, PDO::PARAM_INT);
        $sentencia_articulos->execute();

        $resultado_articulos = $sentencia_articulos->fetchAll();
        return $resultado_articulos;
    }

 
   

}

class Administrador extends Usuario{


 
    function __construct(  )
    {
  
         parent::__construct();

    }

    //Ingresar producto 
  
    public function IngresarPro(string $nombre,int $precio,string $categoria,string $descripcion,string $imagen)
    { 

     $this->nombre=$nombre;
     $this->precio=$precio;
     $this->descripcion=$descripcion;
     $this->imagen=$imagen;
     $this->categoria=$categoria;


        $sql="INSERT INTO tblproductos (nombre,precio,categoria,descripcion,imagen) VALUES(?,?,?,?,?) ";
        $insert=$this->conexion->prepare($sql);
        $data=array($this->nombre= $nombre,$this->precio= $precio,$this->categoria=$categoria,$this->descripcion= $descripcion,$this->imagen= $imagen);
        $resInsert=$insert->execute($data);
        return $resInsert;


    }

    //Modificar producto 

    public function ModificarPro(int $id,string $nombre, int $precio, string $descripcion ,string $imagen)
    {
      $this->id=$id;
      $this->nombre=$nombre;
     $this->precio=$precio;
     $this->descripcion=$descripcion;
     $this->imagen=$imagen;

      $sql="UPDATE tblproductos SET nombre=?,precio=?,descripcion=?,imagen=? WHERE id=$id";
      $update=$this->conexion->prepare($sql);
      $data=array($this->nombre=$nombre,$this->precio=$precio,$this->descripcion=$descripcion,$this->imagen=$imagen);
      $execute=$update->execute($data);
      return $execute;

    }

    //Consulta de un registro 

    public function ConsultarPro($id)
    {
        $this->id=$id;

    $sql="SELECT * FROM tblproductos WHERE id=?";
         
     $consul = $this->conexion->prepare($sql);
     $consul->execute(array($id));
     $request=$consul->fetch();
     return $request;
    }

    public function Consultarventa($id)
    {
        $this->id=$id;

    $sql="SELECT * FROM tbldetalles WHERE idventa=?";
         
     $consul = $this->conexion->prepare($sql);
     $consul->execute(array($id));
     $request=$consul->fetchAll();
     return $request;
    }

    //Eliminar producto

    public function EliminarPro($id)
    {
        $this->id=$id;

        $sql = "DELETE FROM tblproductos WHERE id=?";
        $where = array($id);
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute($where);
        return $del;
    }


    
    //Eliminar venta

    public function EliminarVenta($id)
    {
        $this->id=$id;

        $sql = "DELETE FROM tblventas WHERE id=?";
        $where = array($id);
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute($where);
        return $del;
    }

     //Eliminar pago

     public function EliminarPago($id)
     {
         $this->id=$id;
 
         $sql = "DELETE FROM tblpagos WHERE id=?";
         $where = array($id);
         $delete = $this->conexion->prepare($sql);
         $del = $delete->execute($where);
         return $del;
     }


    //Consulta general a traves del nombre 
    public function BusquedaPro($nombre)

    {
        
         $sql="SELECT * FROM tblproductos WHERE nombre LIKE :nombre OR categoria LIKE :nombre  ";

        $where = $this->conexion->prepare($sql);
        $where->execute(array(':nombre' => $nombre));
        $rs = $where->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }

    //Consulta general a traves del nombre  o pedido en ventas 
    public function BusquedaVenta($nombre)

    {
        
         $sql="SELECT * FROM tblventas WHERE nombre LIKE :nombre OR id LIKE :nombre  ";

        $where = $this->conexion->prepare($sql);
        $where->execute(array(':nombre' => $nombre));
        $rs = $where->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }

     //Consulta general a traves del nombre  o pedido en ventas 
     public function BusquedaPago($nombre)

     {
         
          $sql="SELECT * FROM tblpagos WHERE pedido LIKE :nombre OR id LIKE :nombre  ";
 
         $where = $this->conexion->prepare($sql);
         $where->execute(array(':nombre' => $nombre));
         $rs = $where->fetchAll(PDO::FETCH_ASSOC);
         return $rs;
     }

      


         //Ver ventas 

         public function getVentas ()
         {
            $sql="SELECT * FROM tblventas  ORDER BY `tblventas`.`id` DESC ";
            $execute=$this->conexion->query($sql);
            $request=$execute->fetchAll(PDO::FETCH_ASSOC);
            return $request;
    
         }

         
       
         
    //limitar los articulos por pagina 

    public function getLimiteVentas($iniciar, $articulos_pagina)
    {
        $sql_articulos = 'SELECT * FROM tblventas
         ORDER BY `tblventas`.`id` DESC LIMIT :iniciar,:narticulos';
         
        $sentencia_articulos = $this->conexion->prepare($sql_articulos);
        $sentencia_articulos->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
        $sentencia_articulos->bindParam(':narticulos', $articulos_pagina, PDO::PARAM_INT);
        $sentencia_articulos->execute();

        $resultado_articulos = $sentencia_articulos->fetchAll();
        return $resultado_articulos;
    }

  //Ver pagos

  public function getpagos ()
  {
     $sql="SELECT * FROM tblpagos  ORDER BY `tblpagos`.`id` DESC ";
     $execute=$this->conexion->query($sql);
     $request=$execute->fetchAll(PDO::FETCH_ASSOC);
     return $request;

  }






     //limitar los articulos por pagina 

     public function getLimitepagos($iniciar, $articulos_pagina)
     {
         $sql_articulos = 'SELECT * FROM tblpagos
          ORDER BY `tblpagos`.`id` DESC LIMIT :iniciar,:narticulos';
          
         $sentencia_articulos = $this->conexion->prepare($sql_articulos);
         $sentencia_articulos->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
         $sentencia_articulos->bindParam(':narticulos', $articulos_pagina, PDO::PARAM_INT);
         $sentencia_articulos->execute();
 
         $resultado_articulos = $sentencia_articulos->fetchAll();
         return $resultado_articulos;
     }
 



}
