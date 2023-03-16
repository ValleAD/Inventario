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
    require '../../Model/conexion.php';

//conversion
    if(isset($_POST['info'])){
        $id = $_POST['id'];
        $No =$_POST['Habilitado'];
        $u= $_POST['Nombres'];
        $ap= $_POST['Apellidos'];
        if ($u=$_POST['Nombres']=="" || $ap=$_POST['Apellidos']=="") {
          $sql="UPDATE tb_usuarios SET Habilitado = '$No' WHERE id='$id'" ;
          $result = mysqli_query($conn, $sql);

          if ($result) {
           echo "<script>
           Swal.fire({
              title:'Realizado',
              text:'Datos Fueron Actualizados Correctamente',
              icon:'success',
              allowOutsideClick: false
              }).then((resultado) =>{
                if (resultado.value) {
                    window.location.href='../../Vistas/Empleados/Empleados.php';                               
                }
                });

                </script>";
            }
        }else{
          $u= $_POST['Nombres'];
          $ap= $_POST['Apellidos'];
          $sql="UPDATE tb_usuarios SET Habilitado = '$No',firstname='$u',lastname='$ap' WHERE id='$id'" ;
          $result = mysqli_query($conn, $sql);

          if ($result) {
           echo "<script>
           Swal.fire({
              title:'Realizado',
              text:'Datos Fueron Actualizados Correctamente',
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
                   title: 'ERROR',
                   text: '¡Error! algo salió mal',
                   icon: 'error',
                   allowOutsideClick: false
                   }).then((resultado) =>{
                    if (resultado.value) {
                        window.location.href='../../Vistas/Empleados/Empleados.php';                               
                    }
                    });

                    </script>";
                }
            }
        }

//sql
        if(isset($_POST['submit'])){

            $id1 = $_POST['id'];
            $u= $_POST['Nombres'];
            $ap= $_POST['Apellidos'];
            $sql="UPDATE tb_usuarios SET firstname='$u',lastname='$ap' WHERE id='$id1'" ;
            $result = mysqli_query($conn, $sql);
            if ($result) {
               echo "<script>
               Swal.fire({
                  title:'Realizado',
                  text:'Datos Fueron Actualizados Correctamente',
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
                       title: 'ERROR',
                       text: '¡Error! algo salió mal',
                       icon: 'error',
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