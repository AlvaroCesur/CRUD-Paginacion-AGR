<!doctype html>
<html lang="es_es">

<head>
  <meta charset="utf-8">
  <title>CRUD</title>
  <link rel="stylesheet" type="text/css" href="hoja.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">
</head>

<body>


<?php session_start();

// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if(isset($_SESSION['usuario'])) {

} else {
	// Enviamos al usuario al formulario de registro
	header('Location: registrate.php');
}

?>
  <?php
  //Conexion
  include('conexion.php');

  $conexion = $base->query("SELECT * FROM productos");
  $registros = $conexion->fetchAll(PDO::FETCH_OBJ);


  //Array de objetos
  //$registros = $conexion -> query("SELECT * FROM datos_usuarios") ->fetchAll (PDO::FETCH_OBJ);
  if (isset($_POST["cr"])) {
    $codigoarticulo = $_POST["CODIGOARTICULO"];
    $seccion = $_POST["SECCION"];
    $nombrearticulo = $_POST["NOMBREARTICULO"];
    $precio = $_POST["PRECIO"];
    $fecha = $_POST["FECHA"];
    $importado = $_POST["IMPORTADO"];
    $paisdeorigen = $_POST["PAISDEORIGEN"];

    $sql = "INSERT INTO productos (CODIGOARTICULO, SECCION, NOMBREARTICULO, PRECIO, FECHA, IMPORTADO, PAISDEORIGEN) VALUES(:codArt, :seccion, :nomArt, :precio, :fecha, :importado, :paisOri)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":codArt" => $codigoarticulo, ":seccion" => $seccion, ":nomArt" => $nombrearticulo, ":precio" => $precio, ":fecha" => $fecha, ":importado" => $importado, ":paisOri" => $paisdeorigen));

    header("location:index.php");
  }

  //Se comprueba si el formulario no est'a vacio
  if (isset($_POST["submit"]) && !empty($_POST["busqueda"])) {
    // Filtramos los datos
    $codigoarticulo = "%" . $_POST["busqueda"] . "%";
    $seccion = "%" . $_POST["busqueda"] . "%";
    $nombrearticulo = "%" . $_POST["busqueda"] . "%";
    $precio = "%" . $_POST["busqueda"] . "%";
    $fecha = "%" . $_POST["busqueda"] . "%";
    $importado = "%" . $_POST["busqueda"] . "%";
    $paisdeorigen = "%" . $_POST["busqueda"] . "%";
    

    $conexion = $base->prepare("SELECT * FROM productos WHERE CODIGOARTICULO LIKE :codArt or SECCION LIKE :seccion or NOMBREARTICULO LIKE :nomArt or PRECIO LIKE :precio or FECHA LIKE :fecha or IMPORTADO LIKE :importado or PAISDEORIGEN LIKE :paisOri");
    $conexion->execute(array(":codArt" => $codigoarticulo, ":seccion" => $seccion, ":nomArt" => $nombrearticulo, ":precio" => $precio, ":fecha" => $fecha, ":importado" => $importado, ":paisOri" => $paisdeorigen));
    $registros = $conexion->fetchAll(PDO::FETCH_OBJ);
  } else {
    // Seleccionamos todos los registros en caso de no rellenar la busqueda
    $conexion = $base->query("SELECT * FROM productos");
    $registros = $conexion->fetchAll(PDO::FETCH_OBJ);
  }

  ?>

  <h1>CRUD SUBIDA NOTA 2023<span class="subtitulo">Create Read Update Delete</span></h1>
  <a href="cerrar.php"><button>Cerrar sesión</button></a>
  

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table width="50%" border="0" align="center">
      <tr>
        <td colspan="7" class="primera_fila">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="busqueda" placeholder="Búsqueda">
            <input type="submit" name="submit" value="Buscar">
            <a href="index.php"><button>Atrás</button></a>
          </form>
        </td>
      </tr>
      <tr>
        <td class="primera_fila">CODIGOARTICULO</td>
        <td class="primera_fila">SECCION</td>
        <td class="primera_fila">NOMBREARTICULO</td>
        <td class="primera_fila">PRECIO</td>
        <td class="primera_fila">FECHA</td>
        <td class="primera_fila">IMPORTADO</td>
        <td class="primera_fila">PAISDEORIGEN</td>
        
      </tr>


      <?php

      foreach ($registros as $articulo): ?>

      <!-- Lineas a repetir -->
      <tr>
        <!-- Por cada persona repetida se pone cada uno de sus campos -->
        <td>
          <?php echo $articulo->CODIGOARTICULO ?>
        </td>
        <td>
          <?php echo $articulo->SECCION ?>
        </td>
        <td>
          <?php echo $articulo->NOMBREARTICULO ?>
        </td>
        <td>
          <?php echo $articulo->PRECIO ?>
        </td>
        <td>
          <?php echo $articulo->FECHA ?>
        </td>
        <td>
          <?php echo $articulo->IMPORTADO ?>
        </td>
        <td>
          <?php echo $articulo->PAISDEORIGEN ?>
        </td>


        <!-- Llamamos al archivo de borrar y le pasamos el parametro id (debe ser el mismo que la tabla no como en borrar.php) de la persona -->
        <td class="bot"><a href="borrar.php?CODIGOARTICULO=<?php echo $articulo->CODIGOARTICULO ?>"><input type='button' name='del' id='del'
              value='Borrar'></a></td>
        <td class='bot'><a
            href="editar.php?CODIGOARTICULO=<?php echo $articulo->CODIGOARTICULO ?> & SECCION=<?php echo $articulo->SECCION ?> & NOMBREARTICULO=<?php echo $articulo->NOMBREARTICULO?> & PRECIO=<?php echo $articulo->PRECIO ?>& FECHA=<?php echo  $articulo->FECHA ?> & IMPORTADO=<?php echo $articulo->IMPORTADO ?> & PAISDEORIGEN=<?php echo $articulo->PAISDEORIGEN ?>"><input
              type='button' name='up' id='up' value='Editar'></a></td>
             
      </tr>

      <?php

      endforeach;

      ?>


      <tr>
        <td><input type='text' name='CODIGOARTICULO' size='10' class='centrado'></td>
        <td><input type='text' name='SECCION' size='10' class='centrado'></td>
        <td><input type='text' name='NOMBREARTICULO' size='10' class='centrado'></td>
        <td><input type='text' name='PRECIO' size='10' class='centrado'></td>
        <td><input type='text' name=' FECHA' size='10' class='centrado'></td>
        <td><input type='text' name=' IMPORTADO' size='10' class='centrado'></td>
        <td><input type='text' name=' PAISDEORIGEN' size='10' class='centrado'></td>
        <td class='bot'><input type='submit' name='cr' id='cr' value='+'></td>
      </tr>
      
    </table>
    


    <p>&nbsp;</p>
</body>

</html>