<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="log/signin.php";
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
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  

    <title>Solicitud Bodega</title>
</head>
<body>
    <div class="container">
      <table class="table">
        
           <font color="white"><h1 style="margin-top:5px; text-align: center;">solicitud de Bodega</h1></font>




<style>
 #act {
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
  }
</style>

<br>
    <style>
        #ver{
            margin-top: 2%;
            margin-right: 1%; 
            background: rgb(5, 65, 114); 
            color: #fff; 
            margin-bottom: 0.5%;  
            border: rgb(5, 65, 114);
        }
        #ver:hover{
            background: rgb(9, 100, 175);
        } 
        #ver:active{
        transform: translateY(5px);
        } 
         #act {
            background: whitesmoke;
            padding: 1%;
            border-radius: 15px;
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
  }
    </style>
</table>
</div>
<section id="act">
     <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="form_bodega_info.php">
      <table class="table table-responsive table-striped" id="example2" style=" width: 100%">
            <thead>
              <tr id="tr">
               
                <th style="width: 10%;">Código</th>
                <th style="width: 10%;">Catálogo</th>
                <th style="width: 50%;">Descripción Completa</th>
                <th style="width: 10%; text-align: center;">U/M</th>
                <th style="width: 115%;">Cantidad</th>
                <th style="width: 175%;">Costo Unitario</th>
                <th style="width: 145%;">Fecha Registro</th>
                <th style="width: 145%;" align="center">
                    <button type="submit" name="solicitar" class='btn btn-success btn-sm text-center'  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button> 
                </th>
               
              </tr>
            <td id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
              
            </thead>

            <tbody>

 <?php
    include 'Model/conexion.php';


    //    $sql = "SELECT * FROM tb_productos";
    $sql = "SELECT cod, codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos  GROUP BY precio, codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

        $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");
       $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
      ?>
               


<style type="text/css">

    #td{
        display: none;
    }
   th{
       width: 100%;
   }
</style>
    <tr id="tr">
      <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
      <td data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
      <td data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
      <td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad" style="text-align: center;"><?php  echo $stock; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $precio1?></td>
      <td data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
      <td data-label="solicitar" align="center">
                    
          <input type="checkbox" name="id[]"  value="<?php  echo $productos['cod']; ?>">
          <input type="hidden" name="precio[]"  value="<?php  echo $productos['precio']; ?>">             
         
      </td>
     
<?php } ?> 

            </tbody>
        </table>
</form>
</section>


<script type="text/javascript">
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Eliminar este registro?")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
</script>
</body>
</html>