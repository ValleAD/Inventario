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
    <title>Solicitud Compra</title>
</head>
<body>
<style type="text/css">
      #section{
        margin-left: 2%;
        margin-right: 2%;
      }
        form{
          margin:0;
      }
      }
              @media (max-width: 952px){
   #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
        padding: 2%;
    }
    
    </style>
<?php

$total = 0;
$final = 0;

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_compra ORDER BY fecha_registro DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){

  echo'   
  <section id="section">
  <form method="POST"  action="Controller/añadir_compra_copy.php" target="_blank">
           
        
          <div class="row">
        
            <div class="col-6 col-sm-3" style="position: initial">
        
                <label style="font-weight: bold;">Solicitud No.</label>
                <input readonly class="form-control"  type="text" value="' .$datos['nSolicitud']. '" name="sol_compra">
  
            </div>
  
            <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Dependencia Solicitante</label>
              <input readonly class="form-control"  type="text" value="' .$datos['dependencia']. '" name="dependencia">
            </div>
  
          <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Plazo y No. de Entregas</label>
              <input readonly class="form-control"  type="text" value="' .$datos['plazo']. '" name="plazo">
          </div>
  
          <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Unidad Técnica</label>
              <input readonly class="form-control"  type="text" value="' .$datos['unidad_tecnica']. '" name="unidad">
          </div>
  
          <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Suministro Solicitado</label>
              <input readonly class="form-control"  type="text" value="' .$datos['descripcion_solicitud']. '" name="suministro">
          </div>

          <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Encargado</label>
              <input readonly class="form-control"  type="text" value="' .$datos['usuario']. '" name="usuario">
          </div>
  
            <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Fecha</label>
                <input readonly class="form-control"  type="text" value="'.date("d-m-Y",strtotime($datos['fecha_registro'])). '" name="fech">
            </div>
            <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Estado</label>
                <select  class="form-control"  type="text"  name="estado" required>
                <option disabled selected>Selecione</option>
                <option>Acetado</option>
                <option>Rechazado</option>
                </select>
            </div>
          </div>
        
          <br>
            
          <table class="table" style="margin-bottom:3%">
              
              <thead>
                <tr id="tr">
                  <th>Categoría</th>
                  <th>Código</th>
                  <th>Cod. Catálogo</th>
                  <th style="width:25%;">Descripción Completa</th>
                  <th>U/M</th>
                  <th>Cantidad Solicitada</th>
                  <th>Cantidad Despachada</th>
                  <th>Costo Unitario (estimado)</th>
                  <th>Monto Total (estimado)
                  
                </tr>
                  <td id="td" colspan="8"><h4>No se encontraron resultados 😥</h4></td>
             </thead>
              <tbody>';
  
  $cod_compra = $datos['nSolicitud'];
  }
   $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra = $cod_compra";
      $result = mysqli_query($conn, $sql);
  while ($productos = mysqli_fetch_array($result)){
        
        $total = $productos['stock'] * $productos['precio'];
        $final += $total;
    echo' 
      <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
        <tr>
        <td  data-label="Descripción"><textarea style="background:transparent; border: none; width: 100%;"  name="cat[]" readonly style="border: none">'.$productos['categoria']. '</textarea></td>
          <td  data-label="Código"><input style="background:transparent; border: none; width: 100%;"  name="cod[]" readonly value="' .$productos['codigo']. '"></td>
          <td  data-label="Cod. Catálogo"><input style="background:transparent; border: none; width: 100%;"  name="catalogo[]" readonly value="' .$productos['catalogo']. '"></td>
          <td  data-label="Descripción"><textarea style="background:transparent; border: none; width: 100%;"  name="desc[]" readonly style="border: none">'.$productos['descripcion']. '</textarea></td>
          <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%;" name="um[]" readonly value="'.$productos['unidad_medida']. '"></td>
          <td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%;"  name="cant[]" readonly value="'.$productos['stock']. '"></td>
          <td  data-label="Cantidad"><input style="background:transparent; border: 1 solid #000;  width: 100%;" class="form-control" type="number" required  name="cant_aprobada[]" required value=""></td>
          <td  data-label="Costo unitario"><input style="background:transparent; border: none; width: 100%;"  type="number" step="0.01" name="cost[]" required  placeholder="$'.$productos['precio']. '"></td>
          <td  data-label="total"><input style="background:transparent; border: none; width: 100%;"  name="tot[]" readonly value="$'.$total. '"></td>
         
        </tr>';
  
  }
  
      echo'
      <tr>
        <th colspan="8">Subtotal</th>
        <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" readonly value="$'.$final.'" ></td></tr>
      </tr>
           </tbody>
          </table>
    
      <input id="pdf" type="submit" class="btn btn-lg" value="Guardar Estado" name="pdf">
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
            #cb{
            border-radius: 15px 0px 0px 15px;
            padding: 20px 10px;
            background: whitesmoke;
            }
            #cbq{
            border-radius: 0px 15px 15px 0px;
            padding: 20px 10px;
            background: whitesmoke;
            }
            #c{
            padding: 20px 10px;
            color: violet; 
            flex-wrap: wrap-reverse;
            text-decoration-style: dotted;
            background: whitesmoke;
     }
        </style>
  </form>
  </section>';
  ?>            
  </body>
  </html>

