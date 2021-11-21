<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
  <!--  <link rel="stylesheet" href="styles/estilos.css" type="text/css"> -->
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Materiales a Almacen</title>
</head>
<body>
  
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Almacen de medicamentos, insumos medicos, papeleria y otros articulos</h3>

    <?php
    if(isset($_POST['cod'])) {
        
    $codigo = $_POST['cod'];
    $um = $_POST['um'];
    $nombre = $_POST['nombre'];
    $cant_sol = $_POST['cantSol'];
    $cant_des = $_POST['cantDes'];
    $cost = $_POST['cu'];
    $depto = $_POST['depto'];

    $total = $cost * $cant_des;

    echo 
    '<table style="border-collapse: collapse;
    border: 2px solid;">
    <tr>
      <td><strong>Código</strong></td>
      <td><strong>U/M</strong></td>
      <td><strong>Nombre del artículo</strong></td>
      <td><strong>Cantidad solicitada</strong></td>
      <td><strong>Cantidad despachada</strong></td>
      <td><strong>Costo unitario</strong></td>
      <td><strong>Total</strong></td>

    </tr>
    
    <tr>
      <td>' .$codigo. '</td>
      <td>' .$um. '</td>
      <td>' .$nombre. '</td>
      <td>' .$cant_sol. '</td>
      <td>' .$cant_des. '</td>
      <td>$' .$cost. '</td>
      <td>$' .$total. '</td>
    </tr>
    </table>

    <p>Departamento que solicita: ' .$depto. '</p>
    ';
   
}
?>    
<a href="form_sol_almacen.php">volver</a>
</body>

</html>