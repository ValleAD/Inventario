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

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
        include '../../Model/conexion.php';
//estado compra
        if(isset($_POST['detalle_almacen'])){
           $nSolicitud=$_POST['num_sol'];
           $idusuario = $_POST['idusuario'];
           $estado =$_POST['estado'];
           $sql="UPDATE  tb_almacen SET estado = '$estado' WHERE codAlmacen='$nSolicitud'" ;

           $result = mysqli_query($conn, $sql);

           for($i = 0; $i < count($_POST['cod']); $i++)
           {
              $codigo_producto  = $_POST['cod1'][$i];
              $cantidad_despachada    = $_POST['cantidad_despachada'][$i];
              $codigo= $_POST['cod'][$i];
              $descripcion= $_POST['desc'][$i];
              $unidadmedida= $_POST['um'][$i];
              $idusuario = $_POST['idusuario'];
              $stock = $_POST['cant'][$i];
              $precio= $_POST['cost'][$i];
              $mes              = $_POST['mes'];
              $año              = $_POST['año'];
              $total=$stock-$cantidad_despachada;

              $sql="UPDATE  detalle_almacen SET cantidad_solicitada='$total', cantidad_despachada='$cantidad_despachada' WHERE codigoalmacen='$codigo_producto'" ;
              $query = mysqli_query($conn, $sql);

              $verificar =mysqli_query($conn, "SELECT * FROM historial WHERE Concepto='Entrada Por Almacen' and idusuario='$idusuario' and Entradas='$stock' AND Saldo='$precio' and descripcion='$descripcion' and No_Comprovante='$codigo' and Detalles='$nSolicitud' and ID='$codigo_producto' and No_Comprovante='$codigo'");

              if (mysqli_num_rows($verificar)>0) {

                  $sql2="UPDATE historial SET Salidas='$cantidad_despachada' WHERE Concepto='Entrada Por Almacen' and idusuario='$idusuario' and Entradas='$total' AND Saldo='$precio' and descripcion='$descripcion' and No_Comprovante='$codigo' and Detalles='$nSolicitud'";
                  $query3 = mysqli_query($conn, $sql2);

              }else{

                $sql4="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Salidas,Saldo,idusuario,Detalles,Mes,Año) VALUES('$descripcion','Entrada Por Almacen','$unidadmedida','$codigo','$stock','$cantidad_despachada','$precio','$idusuario','$nSolicitud','$mes','$año')";
               $query4 = mysqli_query($conn, $sql4);

           }

       }
       if ($result || $query|| $query1 || $query4)  {
           echo "<script>
           Swal.fire({
              title:'Realizado',
              text:'El Estado fue Cambiado correctamente',
              icon:'success',
              allowOutsideClick: false
              }).then((resultado) =>{
                if (resultado.value) {
                    window.location.href='../../Vistas/Almacen/Detalle_Almacen.php?detalle&id=$nSolicitud';                               
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
                        window.location.href='../../Vistas/Almacen/solicitudes_almacen.php';                               
                    }
                    });

                    </script>";
                }


            }
            if(isset($_GET['estado1'])){
                $nSolicitud=$_GET['almacen'];
                $estado = $_GET['estado1'];
                $sql="UPDATE  tb_almacen SET estado = '$estado' WHERE codAlmacen='$nSolicitud'" ;
                $result = mysqli_query($conn, $sql);
                if ($estado=='Rechazado') {
                   echo "<script>
                   Swal.fire({
                      title:'Realizado',
                      text:'Producto Rechazado',
                      icon:'success',
                      allowOutsideClick: false
                      }).then((resultado) =>{
                        if (resultado.value) {
                            window.location.href='../../Vistas/Almacen/solicitudes_almacen.php';                               
                        }
                        });

                        </script>";
                    }

                }

                ?>
            </body>
            </html>