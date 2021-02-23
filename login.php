<?php
session_start();

if ($_POST) {
  $usuario = "asri";
  $contraseña = "asri@solu";
  $usuingre = $_POST["usuario"];
  $contraingre = $_POST["contraseña"];

  if ($usuario == $usuingre) {


    if ($contraseña == $contraingre) {


      $_SESSION["USUARIO"] = $usuario;
      header("location:administrador/admin.php");
    }
  } else {

    echo "  <script> alert('Usuario o contraseña incorrecta'); </script> ";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="estilo/img/Logotipo-Asri(1).ico" type="image/x-icon">

    <link rel="stylesheet" href="estilo/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="estilo/css/estilo.css">
  <title>Soluciones Integrales ASRI</title>

</head>

<body>



  <div class="container">

    <div class="row mt-5 ">

    </div>
    <div class="row mt-5 ">

    </div>
    <div class="row mt-5 ">

    </div>

    <div class="row">

      <div class="col-md-4 ">
      </div>


      <div class="col-md-4 ml-4 mr-4 shadow-lg  ">
        <form method="post" action="">

          <a href="index.php"><img src="estilo/img/Logotipo-Asri.png" class="img-fluid mt-3" width="100%" alt="Logotipo Soluciones integrales asri"></a>
          <div class="form-group mt-2 mb-5">
            <label for="my-input  ">Usuario</label>
            <input id="my-input" class="form-control" type="text" name="usuario">
            <label for="my-input  ">Contraseña</label>
            <input id="my-input" class="form-control" type="password" name="contraseña">

            <button class="btn color-busqueda btn-lg btn-block btn-sm mt-4 " type="submit"> Ingresar </button>

          </div>

        </form>
      </div>



      <div class="col-md-4 ">
      </div>
    </div>


    <br><br>
    <div class="col-md-12 text-center">

    </div>
    <br>

</body>

</html>