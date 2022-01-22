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
         <link rel="stylesheet" href="Plugin/bootstap-icon/bootstrap-icons.min.css">
      <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
    <title>Solicitudes De Fondo Circulante</title>
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
		$precio = $row['costo'];
		$fecha = $row['fecha_registro'];
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
 
 <table class="table">
        
        <thead>
              <tr id="tr">
 			 <th class="table-info text-dark"><strong>Código</strong></th>
                <th class="table-info text-dark"><strong>Nombre</strong></th>
                <th class="table-info text-dark"><strong>Unidad de Medida</strong></th>
                <th class="table-info text-dark"><strong>Cantidad Solicitada</strong></th>
                <th class="table-info text-dark"><strong>Precio</strong></th>
                <th class="table-info text-dark"><strong>Fecha Registro</strong></th>
 		</tr>
 	</thead>
 	<tbody>
 		<td data-label="Codigo"><?php echo $codigo ?></td>
 		<td data-label="Descripción"><?php echo $Descripción ?></td>
 		<td data-label="Unidad De Medida"><?php echo $um ?></td>
 		<td data-label="Cantidad Solicitada"><?php echo $Cant_soli ?></td>
 		<td data-label="Precio"><?php echo $precio ?></td>
 		<td data-label="Fecha de Registro"><?php echo $fecha ?></td>
 </tbody>
 </table>

 </div>
</body>
</html>
