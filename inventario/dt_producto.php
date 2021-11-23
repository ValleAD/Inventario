<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
        window.location ="signin.php";
        session_destroy();  
                </script>
die();

    ';
}
    
?><!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Vale</title>
</head>
<body>
 <div id="head" style="height: 17%">
   <a class="nav-link " href="reg_producto.php"><button >Volver</button></a> 
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Departamento de mantenimiento</h3><br>
</div>
<br>
 

<?php
    if(isset($_POST['cod'])) {
        
    $codigo_producto = $_POST['cod'];
    $catalogo=$_POST['catal'];
    $nombre_articulo = $_POST['nombre'];
    $Descripción = $_POST['descr'];
    $u_m = $_POST['um'];
    $cantidad = $_POST['cant'];
    $cost=$_POST['cu'];

    $total = $cost * $cantidad;

    echo'
      <form  style="position: all; width: 70%; height: 100%;margin-bottom: 5%;">
       <section>
      <br>
      <div class="table-responsive">
  <table class="table">
    <tr>
      <td><strong>Código</strong></td>
      <td><strong>catalogo</strong></td>
      <td><strong>Nombre Articulo</strong></td>
      <td><strong>Descripción</strong></td>
      <td><strong>U/M</strong></td>
      <td><strong>Cantidad</strong></td>
      <td><strong>Costo unitario</strong></td>
      <td><strong>Total</strong></td>
    </tr>
    
    <tr>
      <td>' .$codigo_producto. '</td>
       <td>' .$catalogo. '</td>
        <td>' .$nombre_articulo. '</td>
      <td>' .$Descripción. '</td>
      <td>' .$u_m. '</td>
      <td>' .$cantidad. '</td>
      <td>$' .$cost. '</td>
      <td>$' .$total. '</td>
    </tr>
    </table>
    </div>


   <div class="container">
  <div class="row">
    <div class="col">
    <p>  SOLICITA:  </p>
    </div>
    <div class="col-6">
     <p style="margin-left: 80px;">  ENTREGA:</p>
    </div>
      </div>
</div>
          <p  style=" width:35%; margin: 5%; width: 30%; height: 10%;margin-top: 15% margin-bottom: 5%;">AUTORIZA:</p>
          
     </section>
          
    </form>
    ';
   
}
?>            
       
</body>
</html>


