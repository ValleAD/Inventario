<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Solicitud de materiales a almacen</title>
</head>
<body>

<div id="head"  style="position: absolute;
  height: 17% ;margin-top: -15">
   <div style="float: left; position: absolute;">
      <img src="img/log.png" height="110px">
    </div>
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Almacen de medicamentos, insumos médicos, papeleria y otros</h3>
   
  </div>
  <br>
 
<?php
    
    if ( isset($_POST["cod"]) ) { 

      $fecha=$_POST['fech'];
      $Depto=$_POST['depto'];

      echo 
      '
<form  style="position: all; width: 70%; height: 100%;margin-bottom: 5%;">
         
      <section>
        <div class="table-responsive">
        <table class="table" style="margin-top: 20px;">
          <tr>
            <td><strong>Código</strong></td>
            <td><strong>Descripción</strong></td>
            <td><strong>U/M</strong></td>
            <td><strong>Cantidad Solicitada</strong></td>
            <td><strong>Cantidad Despachada</strong></td>
            <td><strong>Costo unitario</strong></td>
            <td><strong>Total</strong></td>
          </tr>';

      for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
        $codigo = $_POST['cod'][$i];
        $nom = $_POST['nom'][$i];
        $um = $_POST['um'][$i];
        $cant_sol = $_POST['cant_sol'][$i];
        $cant_des = $_POST['cant_des'][$i];
        $cost = $_POST['cu'][$i];

    $total = $cost * $cant_des;
      
      
  echo'  
      <tr >
        <td>' .$codigo. '</td>
        <td>' .$um. '</td>
        <td>' .$nom. '</td>
        <td>' .$cant_sol. '</td>
        <td>' .$cant_des. '</td>
        <td>$' .$cost. '</td>
        <td>$' .$total. '</td>
      </tr>'; 
}
      echo'
      </table>     
    </section>

    <section>
        <div class="row">

          <div class="col-4">
            <label style="font-weight: bold;">Departamento que solicita:</label>
            <input class="form-control" type="text" value="' .$Depto. '">
          </div>
      
          <div class="col-4">
              <label style="font-weight: bold;">Fecha:</label>
              <input class="form-control" type="text" value="' .$fecha. '">
          </div>
          

          <div class="row">
            <div class="col-6">
              <br>
              <label style="font-weight: bold;">FIRMA</label>
            </div>

            <div class="col-6">
            <br>
            <label style="font-weight: bold;">SELLO</label>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
            <br>  
            <label style="font-weight: bold;">AUTORIZA:</label>
            </div>
          </div> 
        </div> 
        <br>
      </section>
</form>
      ';
  }
?>            
    
</body>
</html>


