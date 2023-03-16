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
    <body><?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
    include '../../Model/conexion.php';
    if (isset($_POST['submit'])) {

        for($i = 0; $i < count($_POST['cod']); $i++) 
        {
          $codigo_producto  = $_POST['cod'][$i];
          $categoria        = $_POST['categoria'][$i];
          $catalogo         = $_POST['catal'][$i];
          $Descripción      = $_POST['descr'][$i];
          $u_m              = $_POST['um'][$i];
          $cost             = $_POST['cu'][$i];
          $dia              = $_POST['dia'];
          $mes              = $_POST['mes'];
          $año              = $_POST['año'];
          $idusuario = $_POST['idusuario'];
          

          $insert = "INSERT INTO tb_productos (codProductos, categoria, catalogo, descripcion, unidad_medida,precio,dia,mes,año) VALUES ('$codigo_producto', '$categoria', '$catalogo', '$Descripción', '$u_m', '$cost','$dia','$mes','$año')";
          $query = mysqli_query($conn, $insert);

          $sql1="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Saldo,Detalles,idusuario,Mes,Año) VALUES('$Descripción','Inventario Físico','$u_m','$codigo_producto','$cost','0','$idusuario' ,'$mes','$año')";

          $query1 = mysqli_query($conn, $sql1);

          if ($query || $query1) {
            echo "<script>
            Swal.fire({
              title:'Realizado',
              text:'Su producto fue registrado correctamente',
              icon:'success',
              allowOutsideClick: false
              }).then((resultado) =>{
                if (resultado.value) {
                    window.location.href='../../Vistas/Productos/vistaProductos.php';                               
                }
                });

                </script>";
            }else {
                echo "<script>
                Swal.fire({
                  title:'ERROR',
                  text:'¡Error! algo salió mal',
                  icon:'error',
                  allowOutsideClick: false
                  }).then((resultado) =>{
                    if (resultado.value) {
                        window.location.href='../../Vistas/Productos/regi_producto.php';                               
                    }
                    });

                    </script>";
                }
            }
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
