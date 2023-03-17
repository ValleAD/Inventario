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

    include ('../../Model/conexion.php');
    
    
    $nSolicitud     = $_POST['nsolicitud'];
    $dependencia = $_POST['dependencia'];
    $plazo = $_POST['plazo'];
    $u_t= $_POST['unidad_tecnica'];
    $descripcion_solicitud = $_POST['descripcion_solicitud'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
    $jus = $_POST['jus'];
    $dia              = $_POST['dia'];
    $mes              = $_POST['mes'];
    $año              = $_POST['año'];

    //crud para guardar los productos en la tabla tb_compra
    $sql = "INSERT INTO tb_compra (nSolicitud, dependencia, plazo, unidad_tecnica, descripcion_solicitud, usuario,estado,idusuario,justificacion,Mes,Año) VALUES ('$nSolicitud','$dependencia', '$plazo', '$u_t', '$descripcion_solicitud', '$usuario','Comprado','$idusuario','$jus','$mes','$año')";
        $result = mysqli_query($conn, $sql);   


        for($i = 0; $i < count($_POST['cod']); $i++)

        {

          $codigo_producto  = $_POST['cod'][$i];
          $Descripción      = $_POST['desc'][$i];
          $catalogo      = $_POST['cat'][$i];
          $u_m              = $_POST['um'][$i];
          $cantidad         = $_POST['cant'][$i];
          $cost             = $_POST['cu'][$i];
          $solicitud        = $_POST['nsolicitud'];;

            $stock=0;
            $total=0;
            $almacen=0;
            $cods=0;

            if ($nSolicitud==$solicitud || $codigo_producto==$codigo_producto) {
             $sql = "SELECT nSolicitud,codigo,stock FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra ";
             $result = mysqli_query($conn, $sql);
             $stock=0;
             while ($productos = mysqli_fetch_array($result)){
                $cods=$productos['nSolicitud'];
                $almacen=$productos['codigo'];
                $stock=$productos['stock'];
                $total=$cantidad+$stock;
                
                  
            }

            $insert1 = "UPDATE  tb_compra SET stock='$total' WHERE solicitud_compra='$nSolicitud' and codigo='$almacen'";
            $query1 = mysqli_query($conn, $insert1);

            $insert3 = "UPDATE  historial SET Entradas='$total' WHERE Detalles='$nSolicitud' and No_Comprovante='$almacen'";
            $query3 = mysqli_query($conn, $insert3);


        }
        if ($nSolicitud!=$cods || $codigo_producto!=$almacen) {
           
            $insert = "INSERT INTO detalle_compra (codigo, catalogo, descripcion, unidad_medida, stock,cantidad_despachada, precio, solicitud_compra) VALUES ('$codigo_producto','$catalogo', '$Descripción', '$u_m', '$cantidad',0, '$cost', '$solicitud')";
            $query2 = mysqli_query($conn, $insert);

            $sql3="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Saldo,Detalles,idusuario,Mes,Año) VALUES('$Descripción','Solicitud compra','$u_m','$codigo_producto','$cantidad','$cost','$nSolicitud','$idusuario','$mes','$año')";
            $query1 = mysqli_query($conn, $sql3);


        }
    }
    if ($result) {
       echo "<script>
       Swal.fire({
          title:'Realizado',
          text:'Su producto fue registrado correctamente',
          icon:'success',
          allowOutsideClick: false
          }).then((resultado) =>{
            if (resultado.value) {
                window.location.href='../../Vistas/Compra/dt_compra.php?cod=$nSolicitud';                               
            }
            });

            </script>";
        }else {
            echo "<script>
            Swal.fire({
             title: 'ERROR',
             text: '¡Error! algo salió mal',
             icon: 'error',
             allowOutsideClick: false
             }).then((resultado) =>{
                if (resultado.value) {
                    window.location.href='../../Vistas/Circulante/form_circulante1.php';                               
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