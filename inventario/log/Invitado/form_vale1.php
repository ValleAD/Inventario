<?php require '../../Model/conexion.php';
include ('menu.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Productos</title>
</head>

<body style="background-image: url(../../../img/4k.jpg);  
            background-repeat: no-repeat;
            background-attachment: fixed;">
                <style type="text/css">
        #a:hover{
   text-decoration: none;
   color: lawngreen;
}
 #b:hover{
   text-decoration: none;
   color:whitesmoke;
}
.children{
background:burlywood;
}
 </style>

    <font color="white"><h2 class="text-center" >Solicutud Vale</h2></font>
<section id="act">
    
<form style="margin: 0%;position: 0; background: transparent; color: black;" method='POST' action="form_vale2.php">
<div class="mx-5 p-2 r-4" style="background-color: white; border-radius: 5px;">
        <div class="row">
            <div class="col">
           
<table class="table table-responsive table-striped" id="example" style=" width: 100%">
            <thead>
              <tr id="tr">
              <th style=" width: 10%">Código</th>
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

            </thead>

            <tbody>
            <style type="text/css">
     
     #td{
         display: none;
     }
    th{
        width: 100%;
    }
 </style>

 <?php


    //    $sql = "SELECT * FROM tb_productos";
    $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos GROUP BY precio, codProductos";
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