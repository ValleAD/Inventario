
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
?><?php include ('templates/menu.php') ?>
<?php include ('Model/conexion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Producto</title>
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    
    <!-- searchPanes -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <style>
    table thead{
    background: linear-gradient(to right, #4A00E0, #8E2DE2); 
    color:white;
    }
    </style>
</head>
<body>
        <div class="container">
        <div class="row">
        <p style="color: #fff; font-weight: bold; margin-top: 0.5%; margin-right: 2%">Buscar por Código</p>
            <form method="post">
                <div class="row">
                    <div class="col-6 col-sm-8" style="position: initial;">
                        <input class="form-control" placeholder="Código del Producto" name="cod_buscar">
                    </div>
                    <div class="col-6 col-sm-4" style="position: initial;">
                        <input type="submit" class="btn btn-secondary" value="Buscar">
                    </div>
                </div>  
            </form>  
    <div class="col-6 col-sm-4" style="position: initial;">
        <a href="vistaProductos.php" id="ver" class="btn btn-primary">Ver Todos</a>
    </div>
    </div>
    <style>
        #ver{
            background-color: rgb(8, 192, 48); 
            border-color: rgb(11, 160, 23);
        }
        #ver:hover{
            background: rgb(11, 160, 23);
        } 
    </style>
</div>
    <div class="m-5 p-2 r-5" style="background-color: white;">
        <div class="row">
            <div class="col">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                <thead>
                     <tr id="tr">
                     <th style="width: 55px;">Código</th>
                     <th style="width: 55px;">Cod. de Catálogo</th>
                     <th >Descripción Completa</th>
                     <th>U/M</th>
                     <th >Cantidad</th>
                     <th >Costo Unitario</th>
                     <th >Fecha Registro</th>
                     <th >Editar</th>
                     <th >Eliminar</th>
                   </tr>
                </thead>
                <tbody>
<?php
    $sql = "SELECT * FROM tb_productos";
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
           <td data-label="Codificación de catálogo" style="text-align: center;"><?php  echo $productos['catalogo']; ?></td>
           <td data-label="Descripción Completa"><textarea style="background:transparent; border: none; color: black;" cols="10" rows="1" readonly name="" id="" cols="10" rows="3" class="form-control"><?php  echo $productos['descripcion']; ?></textarea></td>
           <td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
           <td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
           <td data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
           <td data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
           <td data-label="Editar">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="vistaProductos.php">             
                <input type='hidden' name='id' value="<?php  echo $productos['codProductos']; ?>">             
                <button name='editar' class='btn btn-info btn-sm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
            </form>  
            </td>
            <td data-label="Eliminar">
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm " class="text-primary" href="Controller/Delete_producto.php?id=<?php  echo $productos['cod']; ?>" onclick="return confirmaion()">Eliminar</a>
            </td>
         </tr>
     
     <?php } ?> 
                </tbody>                
            </table>           
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  

    <!-- searchPanes   -->
    <script src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
    <!-- select -->
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>  
    
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
                "sProcessing":"Procesando...", 
            }
        });

    });
    </script>

</body>
</html>