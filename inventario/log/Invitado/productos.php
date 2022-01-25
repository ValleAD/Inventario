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
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="Plugin/bootstap-icon/bootstrap-icons.min.css">
      <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  

    <title>Productos</title>
</head>
<body>
    <div class="container">
      <table class="table">
        
           <h1 style="margin-top:5px; text-align: center;">Inventario de Productos</h1>



<style>
  #act {
    margin-top: 0.5%;
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
    </style>
</table>
</div>
<div class="container top">
<br>


    <div class="container">
       <div class="row" >
       <table class="table">
            <thead>
              <tr id="tr">
                <th style="width: 175%;">Categoría</th>
                <th>Código</th>
                <th style="width: 135%;">Cod. de Catálogo</th>
                <th style="width: 200%;">Nombre</th>
                <th style="width: 225%;">Descripción Completa</th>
                <th>U/M</th>
                <th style="width: 115%;">Cantidad</th>
                <th>Costo Unitario</th>
                <th style="width: 145%;">Fecha Registro</th>
                
              </tr>

              <tr>

 <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_productos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){?>

       
                <td id="td" colspan="9">
                <h4 align="center">No se encontraron resultados 😥</h4></td>
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
    <tr id="tr">
    <td data-label="Categoría"><?php  echo $productos['categoria']; ?></td>
      <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
      <td data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
      <td data-label="Nombre"><?php  echo $productos['nombre']; ?></td>
      <td data-label="Descripción Completa"><textarea style="background:transparent; border: none; color: black;" cols="10" rows="1" readonly name="" id="" cols="10" rows="3" class="form-control"><?php  echo $productos['descripcion']; ?></textarea></td>
      <td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
      <td data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
      

    
    </tr>

<?php } ?> 

            </tbody>
        </table>
    </div>
</section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
$(function(){
    var textArea = $('#content'),
    hiddenDiv = $(document.createElement('div')),
    content = null;
    
    textArea.addClass('noscroll');
    hiddenDiv.addClass('hiddendiv');
    
    $(textArea).after(hiddenDiv);
    
    textArea.on('keyup', function(){
        content = $(this).val();
        content = content.replace(/\n/g, '<br>');
        hiddenDiv.html(content + '<br class="lbr">');
        $(this).css('height', hiddenDiv.height());
    });
});
</script>
<script type="text/javascript">
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Eliminar este registro?")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
let linkDelete =document.querySelectorAll("delete");
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</body>
</html>