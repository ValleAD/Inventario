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

        $id1 = $_GET['id'];
        $id2 = $_GET['cod'];
        if ($id2==1) {
          echo "<script>
          Swal.fire({
              title:'IMPORTANTE',
              text:'La Cuenta Administrador no de puede Eliminar',
              icon:'info',
              allowOutsideClick: false
              }).then((resultado) =>{
                if (resultado.value) {
                                              
                }
                });

                </script>";
                    
            }else{
                $eliminar ="DELETE FROM tb_usuarios WHERE id='$id1' and tipo_usuario='$id2'";
                $result= mysqli_query($conn, $eliminar);
                if ($result) {
                  echo "<script>
                  Swal.fire({
                      title:'Realizado',
                      text:'Empleado ha sido Eliminado',
                      icon:'success',
                      allowOutsideClick: false
                      }).then((resultado) =>{
                        if (resultado.value) {
                            window.location.href='../../Vistas/Empleados/Empleados.php';                               
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
                                window.location.href='../../Vistas/Empleados/Empleados.php';                               
                            }
                            });

                            </script>";
                        }
                    }
                    ?>

            </body>
            </html>