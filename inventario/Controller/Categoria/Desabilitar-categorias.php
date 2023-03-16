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
    $id = $_POST['id'];
    $No =$_POST['Habilitado'];


//sql


    $sql="UPDATE selects_categoria SET Habilitado = '$No' WHERE id='$id'" ;
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "<script>
      Swal.fire({
          title:'Realizado',
          text:'La Categoria ha sido Desabilitada correctamente',
          icon:'success',
          allowOutsideClick: false
          }).then((resultado) =>{
            if (resultado.value) {
                window.location.href='../../Vistas/Categoria/categorias.php';                               
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
               } ).then((resultado) =>{
                if (resultado.value) {
                    window.location.href='../../Vistas/Categoria/categorias.php';                               
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