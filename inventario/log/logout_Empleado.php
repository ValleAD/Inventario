<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
    <script src="Plugin/bootstrap/js/sweetalert2.all.min.js"></script>
    <script src="Plugin/bootstrap/js/jquery-latest.js"></script>
    <script src="Plugin/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
    require '../Model/conexion.php';
    
//conversion
 $verificar_usuario =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username ='$Nusuario' AND password='$Npassword'");
    $usuario =$_POST['usuario'];
    $Nusuario =$_POST['Nusuario'];
    $Npassword =$_POST['Npassword'];

    $verificar_usuario =mysqli_query($conn, "SELECT username,password FROM tb_usuarios WHERE username ='$Nusuario' AND password='$Npassword'");

    if (mysqli_num_rows($verificar_usuario)>0) {
        echo "
        <script>
        Swal.fire({
          title:'Dato Importante',
          text:'Este Usuario no se puede Actualizado, porque es la misma información que estas cambiando',
          icon:'info',
          allowOutsideClick: false
          }).then((resultado) =>{
            if (resultado.value) {                              
            }
            });

            </script>
            ";
            exit();
        }
//sql
        $sql="UPDATE tb_usuarios SET username='$Nusuario', password='$Npassword' WHERE id='$usuario'" ;
        $result = mysqli_query($conn, $sql);
        if ($result) {
            session_start();
            session_destroy();
            echo "
            <script>
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 2000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
                icon: 'success',
                title: 'Usuario creado correctamente',

                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href='home.php';
                 }
                 })


                 </script>
                 ";
             } else {
                 echo "
                 <script>
                 Swal.fire({
                  title:'ERROR',
                  text:'¡Error! algo salió mal',
                  icon:'error',
                  allowOutsideClick: false
                  }).then((resultado) =>{
                    if (resultado.value) {                              
                    }
                    });
                    </script>
                    ";
                }

                ?>
            </body>
            </html>