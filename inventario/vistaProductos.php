<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
        window.location ="signin.php";
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
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

      <link rel="stylesheet" href="bootstap-icon/fontawesome.all.min.css">
      <link rel="stylesheet" type="text/css" href="sweetalert2/sweetalert2.min.css">
    <title>Productos</title>
</head>
<body>
    <div class=" container table-responsive ">
        <h2 class="text-center mg-t" style="color: #fff; margin-top: 2%;">Inventario de productos</h2>
        <table class="table table-dark table-hover table-bordered " style="vertical-align: bottom;">
            <tr>
                <a href="regi_producto.php" class="text btn btn-info "><i class="bi bi-file-earmark-plus-fill"></i> <span>Nuevo Producto</span> </a><br>
                <td class="table-info text-dark"><strong>Código</strong></td>
                <td class="table-info text-dark"><strong>Codificación de catálogo</strong></td>
                <td class="table-info text-dark"><strong>Nombre</strong></td>
                <td class="table-info text-dark"><strong>Descripción Completa</strong></td>
                <td class="table-info text-dark"><strong>U/M</strong></td>
                <td class="table-info text-dark"><strong>Cantidad</strong></td>
                <td class="table-info text-dark"><strong>Costo unitario</strong></td>
                <td class="table-info text-dark"><strong>Accion</strong></td>
                
            </tr>
<?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_productos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result))
{
?>
            <tr >
               <td class="delete"><?php  echo $productos['codProductos']; ?></td>
               <td class="delete"><?php  echo $productos['catalogo']; ?></td>
               <td class="delete"><?php  echo $productos['nombre']; ?></td>
               <td class="delete"><?php  echo $productos['Descripcion']; ?></td>
               <td class="delete"><?php  echo $productos['unidad_medida']; ?></td>
               <td class="delete"><?php  echo $productos['stock']; ?></td>
               <td class="delete">$<?php  echo $productos['precio']; ?></td>
              
            <script type="text/javascript">
                function confirmaionDelete(id=<?php  echo $productos['codProductos']; ?>) {
                 Swal.fire({
                  title: 'Producto <?php  echo $productos['nombre']; ?>',
                  text: "Este Registro Registro sera Eliminardo Permanentemente",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Eliminar'

                }).then((result) => {
                    
                  if (result.isConfirmed) {
                   
                     
            window.location = 'Controller/Delete_producto.php?id=<?php  echo $productos['codProductos']; ?>'
        
                      } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                      ) {
                        swalWithBootstrapButtons.fire(
                          
                        )
                      }
                })

                }
                 function Update(codProductos=<?php  echo $productos['codProductos']; ?>) {
                 Swal.fire({
                  title: 'Producto <?php  echo $productos['nombre']; ?>',
                  text: "Desas Actualizar este Producto",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Actualizar'

                }).then((result) => {
                    
                  if (result.isConfirmed) {
                   
                     
           window.location = 'Controller/Actualizar_productos.php?id=<?php  echo $productos['codProductos']; ?>'
        
                      } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                      ) {
                        swalWithBootstrapButtons.fire(
                          
                        )
                      }
                })

                }

</script>
            <!--Botones para actualizar y eliminar-->
               <td><a  href="Actualizar_productos.php?id=<?php  echo $productos['codProductos']; ?>" style="margin-right: 15%" id="btn_custom"  class="text-primary"><i class="far fa-edit"></i></a> 

        
               <a onclick="return confirmaionDelete(id=<?php  echo $productos['codProductos']; ?>)" class="text-danger"> <i class="fas fa-trash"></i> </a></td>
            </tr>
            <?php } ?> 
        </table>
    </div>

   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
 <script src="codigo_modal.js"></script>  
 <script type="text/javascript" src="jquery/comfirmacion.js"></script>
  <script src="sweetalert2/sweetalert2.min.js"></script>
<script src="sweetalert2/sweetalert2.all.min.js"></script>
</body>
</html>
