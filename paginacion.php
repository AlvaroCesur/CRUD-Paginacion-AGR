<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="hoja.css">
<title>CRUD</title>
</head>

<body>
	
<?php
	 include('conexion.php');

		$registros_por_pagina = 10;
		$paginaActual = 1;
		
			if (isset($_GET["pagina"])){
				$paginaActual=$_GET["pagina"];
			}
		
		$empezar_desde=($paginaActual-1)*$registros_por_pagina;
		
		$sql_total="SELECT * FROM productos";
		$resultado=$base->prepare($sql_total);
		$resultado->execute(array());
		
		$num_filas=$resultado->rowCount();
		$total_paginas=ceil($num_filas/$registros_por_pagina);
		
		$sql_limite="SELECT * FROM productos LIMIT $empezar_desde,$registros_por_pagina";
		$resultado=$base->prepare($sql_limite);
		$resultado->execute(array());
	
?>
<?php

$registro=$base->query("SELECT * FROM productos LIMIT $empezar_desde,$registros_por_pagina")->fetchAll(PDO::FETCH_OBJ);

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
    header("location:paginacion.php");
  }

  if (isset($_GET["pagina"])){
    $paginaActual=$_GET["pagina"];				
  }

  if (isset($_POST["submit"]) && !empty($_POST["busqueda"])) {

    $codigoarticulo = "%" . $_POST["busqueda"] . "%";
    $seccion = "%" . $_POST["busqueda"] . "%";
    $nombrearticulo = "%" . $_POST["busqueda"] . "%";
    $precio = "%" . $_POST["busqueda"] . "%";
    $fecha = "%" . $_POST["busqueda"] . "%";
    $importado = "%" . $_POST["busqueda"] . "%";
    $paisdeorigen = "%" . $_POST["busqueda"] . "%";
    $conexion = $base->prepare("SELECT * FROM productos WHERE CODIGOARTICULO LIKE :codArt or SECCION LIKE :seccion or NOMBREARTICULO LIKE :nomArt or PRECIO LIKE :precio or FECHA LIKE :fecha or IMPORTADO LIKE :importado or PAISDEORIGEN LIKE :paisOri");
    $conexion->execute(array(":codArt" => $codigoarticulo, ":seccion" => $seccion, ":nomArt" => $nombrearticulo, ":precio" => $precio, ":fecha" => $fecha, ":importado" => $importado, ":paisOri" => $paisdeorigen));
    $registro = $conexion->fetchAll(PDO::FETCH_OBJ);

  }

  ?>

 <h1>CRUD PAGINACIÓN 2023<span class="subtitulo">Create Read Update Delete</span></h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table width="50%" border="0" align="center">
      <tr>
        <td href="cerrar.php" class="primera_fila"><button>Cerrar sesión</button></td>
        <td colspan="6" class="primera_fila">
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

      foreach ($registro as $articulo): ?>

      <tr>
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
        <td colspan=7>
          <?php
            for ($i=1; $i<=$total_paginas; $i++){
              echo "<a href='paginacion.php?pagina=" . $i . "'>" . $i . "</a>  ";
            }
          ?>
        </td>
    </table>
</body>
</html>