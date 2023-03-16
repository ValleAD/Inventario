    
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/bootstrap.css">
    <script src="../../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>
    <script src="../../Plugin/bootstrap/js/jquery-latest.js"></script>
    <script src="../../Plugin/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
    include '../../Model/conexion.php';

    $cod = $_GET['cod'];
    $id1 = $_GET['id'];
    $cod_producto = $_GET['codProductos'];

    if ($id1<1) {

        $eliminar ="DELETE FROM tb_productos WHERE cod='$cod' AND stock='$id1'";
        $result= mysqli_query($conn, $eliminar);

        if ($result) {
            
            echo "<script>
            Swal.fire({
              title:'Eliminado!',
              html:'El Código Producto <b>' +$cod_producto+ '</b> fue Eliminado Sastisfactoriamente',
              icon:'success',
              allowOutsideClick: false
              }).then((resultado) =>{
                if (resultado.value) {
                    window.location.href='../../Vistas/Productos/vistaProductos.php';                               
                }
                });

                </script>";
            }
        } else {
         echo "
         <script>
         Swal.fire({
            title: 'ERROR',
            text:'EL Producto no se pudo Eliminar',
            icon:'error',
            allowOutsideClick: false
            }).then((resultado) =>{
                if (resultado.value) {
                    window.location.href='../../Vistas/Productos/vistaProductos.php';                               
                }
                });
                </script>";
            }

            ?>
            <script >
             $(document).ready(function() {
                function disableBack() {
                    window.history.forward()
                }
                window.onload = disableBack();
                window.onpageshow = function(e) {
                    if (e.persisted)
                        disableBack();
                }
            });
        </script>
    </body>
    </html>

