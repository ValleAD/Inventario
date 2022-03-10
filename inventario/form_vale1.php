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
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.css"/>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.css"/>
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
  

    <title>Productos</title>
</head>
<body>
    <div class="container">
      <table class="table">
        
           <h1 style="margin-top:5px; text-align: center;">solicitud de Vale</h1>




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
     <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="form_vale2.php">
      <table class="table table-responsive table-striped" id="example" style=" width: 100%">
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

              <tr> <td id="td" colspan="11">
                <h4 align="center">No se encontraron resultados 😥</h4></td>
              </tr>
            </thead>

            <tbody>

 <?php
    include 'Model/conexion.php';


    //    $sql = "SELECT * FROM tb_productos";
    $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos GROUP BY precio, codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

        $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");
       $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 0,",");
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
      <td data-label="Descripción Completa"><textarea style="background:transparent; border: none; color: black;" cols="10" rows="1" readonly name="" id="" cols="10" rows="3" class="form-control"><?php  echo $productos['descripcion']; ?></textarea></td>
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
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.js"></script>
    <script>
    $(document).ready(function(){
 $('#example').DataTable({    

        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        paging: false,
        dom: 'Bfrtil',          
    });     

    });
    </script>
</body>
</html>