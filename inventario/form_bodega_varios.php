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





<style>
    #div{
        display: none;
    }

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
   @media (max-width: 800px){
    .bu{
        margin: 2%;
    }
   }
    </style>
<br><br><br>
           <h1 style="margin-top:5px; text-align: center;">Solicitud de Bodega</h1>

<section id="act">
    <h1 id="td" class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda.</h1>
     <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="form_bodega_info.php">
       <table class="table  table-striped" id="div" style=" width: 100%">
            <thead>
              <tr id="tr">
               
                <th style="width: 10%;">Código</th>
                <th style="width: 10%;">Catálogo</th>
                <th style="width: 35%;">Descripción Completa</th>
                <th style="width: 10%;">U/M</th>
                <th style="width: 10%;">Cantidad</th>
                <th style="width: 10%;">Costo Unitario</th>
                <th style="width: 20%;">Fecha Registro</th>
                <th style="width: 10%;" align="center"><button id="div" style=" float: right;margin-bottom: 1%;" type="submit" name="solicitar" class='btn btn-success btn-sm text-center'  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button>
                </th>
               
              </tr>

            </thead>
</table>
  <div id="div" style = "max-height: 442px; overflow-y:scroll;">
<table class="table">
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
        $stock=number_format($cantidad, 2,".",",");
      ?>
               


<style type="text/css">

    #td{
        display: none;
    }
   th{
       width: 100%;
   }
   #div{
    display: block;
   }
</style>
    <tr id="tr">
      <td style="width: 12%" data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
      <td style="width: 12%" data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
      <td style="width: 35%" data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
      <td style="width: 12%" data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
      <td style="width: 12%" data-label="Cantidad" style="text-align: center;"><?php  echo $stock; ?></td>
      <td style="width: 12%" data-label="Costo Unitario">$<?php  echo $precio1?></td>
      <td style="width: 12%" data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
      <td style="width: 12%" data-label="solicitar" align="center">
                    
          <input type="checkbox" name="id[]"  value="<?php  echo $productos['cod']; ?>">
          <input type="hidden" name="precio[]"  value="<?php  echo $productos['precio']; ?>">             
         
      </td>
     
<?php } ?> 
</tr>
            </tbody>
        </table>
    </div>
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