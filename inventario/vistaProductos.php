
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
?><?php include ('templates/menu.php') ?>
<?php include ('Model/conexion.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VistaProductos</title>
   <!-- Bootstrap CSS -->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.css"/>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.css"/>
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
    <style>
    table thead{
    background: linear-gradient(to right, #4A00E0, #8E2DE2); 
    color:white;
    }
    </style>
</head>
<body>
<?php      

if (isset($_POST['editar'])){       
    $id = $_POST['id'];       
   
  
 
$sql = "SELECT cod, codProductos, categoria, catalogo,  descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE  codProductos = '$id'";
$result = mysqli_query($conn, $sql);


    while ($productos1 = mysqli_fetch_array($result)){
?>


<form action="Controller/Actualizar.php" method="post">
  <h3 align="center">Actualizar Producto</h3>
    <div class="container" style="background: rgba(0, 0, 0, 0.6); border-radius: 9px; color:#fff; font-weight: bold;">
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin-left: 17%; margin-top: 2%">
                <label for="">Categoría</label><br> 
                <select  class="form-control" name="categoria" id="um" >
                        <option   ><?php  echo $productos1['categoria']; ?></option>
                        <?php 
                     $sql = "SELECT * FROM  selects_categoria";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['categoria'].'</option>
                      ';   
                     } 
                           ?>
                      </select>
            </div>
           
            <div class="col-6 col-sm-4" style="position: initial; margin-top: 2%;">
                <label for="">Código</label>
                <input class="form-control"  type="hidden" name="cod" id="act" value="<?php  echo $productos1['cod']; ?>">
                <input class="form-control"  type="text" name="codProducto" id="act" value="<?php  echo $productos1['codProductos']; ?>">
            </div>
        </div> 

        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin-left: 17%;">
                <label for="">Codificación de Catálogo</label>
                <input class="form-control"  type="text" name="codCatalogo" id="act" value="<?php  echo $productos1['catalogo']; ?>">
            </div>

            
        </div>

        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin-left: 17%;">
                <label for="">Descripción</label>
                <textarea cols="50" rows="1" class="form-control" type="text"  name="descripcion" id="act" style="width: 100;height: 90%"><?php  echo $productos1['descripcion']; ?></textarea>                     
            </div>

            <div class="col-6 col-sm-4" style="position: initial">
                <div class="form-group" >
                    <label>Unidad de medida (U/M)</label>
                    <div class="col-md-16" >
                        <div class="invalid-feedback">
                        Por favor seleccione una opción.
                    </div>
                    <select  class="form-control" name="um" id="um" >
                            <option  ><?php  echo $productos1['unidad_medida']; ?></option>
                            <?php 
                     $sql = "SELECT * FROM  selects_unidad_medida";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['unidad_medida'].'</option>
                      ';   
                     } 
                           ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin-left: 17%;">
                <label for="">Cantidad Actual</label>
                <input class="form-control" type="text" name="stock" id="act" value="<?php  echo $productos1['SUM(stock)']; ?>">
            </div>
            <div class="col-6 col-sm-4" style="position: initial;">
                <label for="">Costo unitario</label>
                <input class="form-control" type="text" name="precio" id="act" value="<?php  echo $productos1['precio']; ?>">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin-left: 17%; margin-bottom: 2%;">
                <button type="submit" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
                <a href="vistaProductos.php" class ="btn btn-primary" style="background:rgb(184, 8, 8); border: none">Cancelar</a>
            </div>
        </div>
    </div>
</form>

<style>
  #act {
    margin-top: 0.5%;
  }
</style>
<?php 
  }
} 
?>
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
<font color="white"><h2 class="text-center" >Inventario de Productos</h2></font>
<br>
    <div class="mx-5 p-2 r-5" style="background-color: white; border-radius: 5px;">
        <div class="row">
            <div class="col">
           <a href="unidad_medidad.php" class="btn btn-primary" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Unidad de medidas</a>  
<table class="table table-responsive table-striped" id="example" style=" width: 100%">
                <thead>
                     <tr id="tr">
                     <th style=" width: 20%">Código</th>
                     <th style=" width: 20%">Cod. de Catálogo</th>
                     <th style=" width: 100%">Descripción Completa</th>
                     <th style=" width: 100%">U/M</th>
                     <th style=" width: 100%">Cantidad</th>
                     <th style=" width: 100%">Costo Unitario</th>
                     <th style=" width: 100%">Fecha Registro</th>

                     <!-- <th style=" width: 100%">Solicitudes</th> -->

                     <th style=" width: 100%">Categoría</th>

                     <th style=" width: 100%">Editar</th>
                     <th style=" width: 100%">Eliminar</th>
                   </tr>
                </thead>
                <tbody>
<?php
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);

    if(isset($_POST['cat_buscar'])){

        $buscar_cat = $_POST['cat_buscar'];

        $sql = "SELECT * FROM tb_productos WHERE categoria = $buscar_cat";
        $result = mysqli_query($conn, $sql);
       
    }

    if(isset($_POST['cod_buscar'])){
        $buscar_cod = $_POST['cod_buscar'];

        $sql = "SELECT * FROM tb_productos WHERE codProductos = $buscar_cod";
        $result = mysqli_query($conn, $sql);
    }
?>

<?php
    while ($productos = mysqli_fetch_array($result)){
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
           <td data-label="Codigo" style="text-align: center;"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo" style="text-align: center;"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['categoria']; ?></td>
           <td  data-label="Editar">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="vistaProductos.php">             
                <input type='hidden' name='id' value="<?php  echo $productos['codProductos']; ?>">             
                <button name='editar' class='btn btn-info btn-sm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
            </form>  
            </td>
            <td  data-label="Eliminar">
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm " class="text-primary" href="Controller/Delete_producto.php?id=<?php  echo $productos['cod']; ?>" onclick="return confirmaion()">Eliminar</a>
            </td>
         </tr>
     
     <?php } ?> 
                </tbody>                
            </table>           
             <form method="POST" action="">
                <div class="container">
                 <div class="row">
                    <div class="col-md-4" style="position: initial">
                      <select class="form-control" name="cat" id="w" required>
                    <option selected disabled value="">Seleccione</option>
                <?php  $sql = "SELECT * FROM tb_productos GROUP BY categoria ";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                echo "<option>".$productos['categoria']."</option>";

            }
         ?></select>
                    </div>
                    <div class="col-md-6" style="position: initial">
                       <button class="btn btn-success" name="categorias" type="submit">Exportar por Categorias</button>
                    </div>
                </div>
            </div>
                
               
            </form>   
            <?php 

if (isset($_POST['categorias'])){  ?>  <br> 
<div class="mx-5 p-2 r-5" style="background-color: white; border-radius: 5px;">
        <div class="row">
            <div class="col">
                <table class="table table-responsive table-striped" id="example1" style=" width: 100%">
    <thead>
         <tr id="tr">
                     <th style=" width: 10%">Categoria</th>
                     <th style=" width: 10%">Código</th>
                     <th style=" width: 10%">Cod. de Catálogo</th>
                     <th style=" width: 30%;padding-left:3%">Descripción Completa</th>
                     <th style=" width: 10%">U/M</th>
                     <th style=" width: 10%">Cantidad</th>
                     <th style=" width: 10%">Costo Unitario</th>
                     <th style=" width: 70%">Fecha Registro</th>
                     
                   </tr>
    </thead>
    <tbody>
         <?php $categoria=$_POST['cat'];

             // code...
         
                   $sql = "SELECT * FROM tb_productos WHERE categoria='$categoria' ";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                if ($_POST['cat']==$productos['categoria']) {?>
                   <tr>
                <td data-label="Codigo" style="text-align: center;"><?php  echo $productos['categoria']; ?></td>
                <td data-label="Codigo" style="text-align: center;"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo" style="text-align: center;"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" style="text-align: left;padding-left:3%"><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
        </tr>
                <?php}}?>
      <?php   }}} ?>
    </tbody>
</table>
  
</div>
            </div> 
            </div>
        </div>
    </div>
</div>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.js"></script>
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
        dom: 'Bfrtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]           
    });     

    });
    </script>
    <script type="text/javascript">
         $(document).ready(function(){
 $('#example1').DataTable({        
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
        dom: 'Bfrtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]           
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
</body>
</html>