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
<?php include ('templates/menu.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/estilo.css" > 
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <link rel="stylesheet" href="Plugin/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="Plugin/assets/css/bootstrap-theme.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Vale</title>
</head>
<body>
    <style type="text/css">
              @media (max-width: 952px){
   #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
    }
    th{
        width: 25%;
    }
  }
    </style>
<?php
//fecha
date_default_timezone_set('UTC');
$total = 0;
$final = 0;

    $departamento = $_POST['departamento'];
    $odt = $_POST['numero_vale'];
    $usuario = $_POST['usuario'];
 //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_vale (codVale, departamento,usuario) VALUES ('$odt', '$departamento','$usuario')";
    $result = mysqli_query($conn, $sql); 
      
        
         for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $odt = $_POST['numero_vale'];

  
      $insert = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio,numero_vale) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$odt')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su solicitud fué realizada correctamente');
       
        </script>
        ";
      }if ($result) {
        
      }else {
        echo "<script> alert('¡Error! algo salió mal');
       location.href = 'form_vale.php';
        </script>
        ";
      }
    }

    
for ($i=0; $i < count($_POST['cod']) ; $i++) {

  $codigo= $_POST['cod'][$i];
  $stocks =$_POST['stock'][$i];   
  $stock_obtenido =$_POST['cant'][$i];
  $stock_descontado=$stocks - $stock_obtenido;
   
//sql
$sql1="UPDATE tb_productos SET stock='$stock_descontado' WHERE codProductos ='$codigo'" ;
$result = mysqli_query($conn, $sql1);
}
if ($query) {
  echo "<script> alert('Valores descontados correctamente');
  </script>
  ";
}if ($result) {
  
}else {
  echo "<script> alert('¡Error! algo salió mal');
 location.href = 'form_vale.php';
  </script>
  ";
}
    //Detalles Vale
      for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $total = $stock* $precio;
      $final += $total;

   include 'Model/conexion.php';
echo'    
<section id="section">
<form method="POST" action="Exportar_PDF/pdf_vale.php" target="_blank">
         
      
        <div class="row">
      
          <div class="col-6 col-sm-3" style="position: initial">
      
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input readonly class="form-control"  type="text" value="' .$departamento.'" name="depto">

          </div>

          <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">N° de Vale:</label>
            <input readonly class="form-control"  type="text" value="' .$odt. '" name="vale">
          </div>

        <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <input readonly class="form-control"  type="text" value="' .$usuario.'" name="usuario">
        </div>

          ';  }
?>  
          <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="<?php echo date('d/m/Y'); ?>" name="fech">
          </div>
        </div>
      
        <br>
          
        <table class="table" style="margin-bottom:3%">
            
            <thead>
              <tr id="tr">
                <th>Código</th>
                <th style="width: 35%;">Descripción</th>
                <th>Unidad de Medida</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Total</th>
              </tr>
                <td id="td" colspan="8"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
            <tbody>




    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
        <td  data-label="Código"><input style="background:transparent; border: none; width: 100%;"  name="cod" readonly value="<?php echo $codigo ?>"></td>
        <td  data-label="Descripción"><textarea style="background:transparent; border: none; width: 100%;"  name="desc" readonly style="border: none"><?php echo $descripcion ?></textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%;" name="um" readonly value="<?php echo $unidadmedida ?>"></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%;"  name="cant" readonly value="<?php echo $stock ?>"></td>
        <td  data-label="Costo unitario"><input style="background:transparent; border: none; width: 100%;"  name="cost" readonly value="$ <?php echo $precio ?>"></td>
        <td  data-label="total"><input style="background:transparent; border: none; width: 100%;"  name="tot" readonly value="$ <?php echo $total ?>"></td>
        
      </tr>
      <th colspan="5">SubTotal</th>
      <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" readonly value="$ <?php echo $final ?>" ></td></tr>
  
         </tbody>
        </table>

    
  
    <input id="pdf" type="submit" class="btn btn-lg" value="Exportar a PDF" name="pdf">
      <style>
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
</section>
 
  </body>
  </html>


