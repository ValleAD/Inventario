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
<?php include ('templates/menu.php')?>
    <div class="container">
        <div class="row">
            <p style="margin-top: 0.5%; font-weight: bold; color: #fff;">Buscar Por</p>
        <form action="" method="post">
            <div class="col-16 col-sm-12">
                <select class="form-control" name="buscar" id="buscar" required onchange="this.form.submit()">
                    <option value="">Seleccionar...</option>
                    <option value="categoria">Categoría</option>
                    <option value="codigo">Código de Producto</option>
                </select>
            </div>
        </form>   
        <?php
        if(isset($_POST['buscar'])){
            $busqueda = $_POST['buscar'];
    
            if($busqueda == "categoria"){
                echo'
                <form method="post">
                    <div class="row">
                        <div class="col-6 col-sm-12">
                            <select class="form-control" onchange="this.form.submit()">
                                <option>Seleccionar Categoría</option>
                                <option>Agropecuarios y Forestales</option>
                                <option>Cuero y Caucho</option>
                                <option>Químicos</option>
                                <option>Combustibles y Lubricantes</option> 
                                <option>Minerales no Metálicos</option>
                                <option>Minerales Metálicos</option>
                                <option>Herramientas y Repuestos</option>
                                <option>Materiales Eléctricos</option>
                            </select>  
                        </div>
                    </div>       
                </form>';
            }
            else if($busqueda == "codigo"){
                echo'
                <form method="post">
                    <div class="row">
                        <div class="col-6 col-sm-8">
                            <input class="form-control" placeholder="Código del Producto">
                        </div>
                        <div class="col-6 col-sm-4" style="position: initial;">
                            <input type="submit" class="btn btn-secondary" value="Buscar">
                        </div>
                    </div>  
                </form>';
            }
        }
    ?>
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
    <hr>
        <div class="row" >
            <table class="table">
                 <thead>
                   <tr id="tr">
                     <th style="width: 165%;">Categoría</th>
                     <th>Código</th>
                     <th style="width: 135%;">Cod. de Catálogo</th>
                     <th style="width: 180%;">Nombre</th>
                     <th style="width: 225%;">Descripción Completa</th>
                     <th style="width: 80%;">U/M</th>
                     <th style="width: 110%;">Cantidad</th>
                     <th>Costo Unitario</th>
                     <th style="width: 145%;">Fecha Registro</th>
                     <th>Editar</th>
                     <th style="width: 125%;">Eliminar</th>
                   </tr>
                   <tr>
      <?php
         include 'Model/conexion.php';
         $sql = "SELECT * FROM tb_productos";
         $result = mysqli_query($conn, $sql);
     
         while ($productos = mysqli_fetch_array($result)){
     ?>
     
            
                     <td id="td" colspan="9">
                     <h4>No se encontraron resultados 😥</h4></td>
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
           <td data-label="Codigo" style="text-align: center;"><?php  echo $productos['codProductos']; ?></td>
           <td data-label="Codificación de catálogo" style="text-align: center;"><?php  echo $productos['catalogo']; ?></td>
           <td data-label="Nombre"><?php  echo $productos['nombre']; ?></td>
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
                         <a data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm " class="text-primary" href="Controller/Delete_producto.php?id=<?php  echo $productos['codProductos']; ?>" onclick="return confirmaion()">Eliminar</a>
           </td>
         </tr>
     
     <?php } ?> 
     
                 </tbody>
             </table>
         </div>
    </div>
</body>
</html>