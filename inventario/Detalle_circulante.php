<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="../log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?>
<?php include ('templates/menu.php');
      include ('Model/conexion.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
     <link rel="stylesheet" type="text/css" href="styles/estilos_menu.css" >
     <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
    <title>Detalle Circulante</title>
</head>


<body style="color:white;">
 <?php 

$id = $_GET['id'];
$sql = "SELECT * FROM tb_circulante WHERE codigo='$id'";
if($result= mysqli_query($conn,$sql)){
if (mysqli_num_rows($result)>0) {

	while ($row = mysqli_fetch_array($result)) {
		$codigo = $row['codigo'];
		$Descripción = $row['descripcion'];
		$um = $row['unidad_medida'];
		$Cant_soli = $row['cantidad_solicitada'];
        $fecha = $row['fecha_registro'];
		$precio = $row['costo'];
		
        $totalF= $precio*$Cant_soli;
	}

	mysqli_free_result($result);
	}else{
		echo "El Produto no Exixte";
	}
}else{
		echo "ERROR: No se  pudo ejecutar la sentencia SQL por que " . mysql_errno($conn);
}
 ?>
 <h1 style="color:white;text-align: center;"> Detalles Circulantes</h1>
 <div class="container">
 <form action="Exportar_PDF/pdf_circulante.php" method="POST">
 <table class="table">
        
        <thead>
              <tr id="tr">
 			 <th class="table-info text-dark"><strong>Código</strong></th>
                <th class="table-info text-dark"><strong>Nombre</strong></th>
                <th class="table-info text-dark"><strong>Unidad de Medida</strong></th>
                <th class="table-info text-dark"><strong>Cantidad Solicitada</strong></th>
                <th class="table-info text-dark"><strong>Fecha Registro</strong></th>
                 <th class="table-info text-dark"><strong>Precio</strong></th>
 		</tr>
 	</thead>
 	<tbody>
 		<td data-label="Codigo"><input type="text" name="cod" value="<?php echo $codigo ?>"></td>
 		<td data-label="Descripción"><input type="text" name="desc" value="<?php echo $Descripción ?>"></td>
 		<td data-label="Unidad De Medida"><input type="text" name="um" value="<?php echo $um ?>"></td>
 		<td data-label="Cantidad Solicitada"><input type="text" name="cant" value="<?php echo $Cant_soli ?>"></td>
        <td data-label="Fecha de Registro"><input type="text" name="fecha" value="<?php echo $fecha ?>"></td>
 		<td data-label="Precio"><input type="text" name="precio" value="<?php echo $precio ?>"></td>
 		<tr>
            <td colspan="5" style="text-align:right"><b>Total</b></td>
            <td><input type="text" name="Total" value="<?php echo $totalF ?>"></td>
        </tr>
        
 </tbody>
 </table>
 <button id="pdf" type="submit" class="btn btn-lg" name="pdf">Exportar a PDF</button>
      <style>
        input{
            background:transparent; border: none; width: 100%;
        }
        td{
          background: transparent;
        }
        #pdf{
        margin-left: 38%; 
        background: rgb(175, 0, 0); 
        color: #fff; margin-bottom: 2%; 
        border: rgb(0, 0, 0);
        }
        #pdf:hover{
        background: rgb(128, 4, 4);
        } 
        #pdf:active{
        transform: translateY(5px);
        } 
      </style>
</form>
 </div>
</body>
</html>
