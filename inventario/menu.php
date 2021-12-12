<?php
include("Model/conexion.php");
if(!isset($_SESSION['signin'])){
    header("location: signin.php");
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/estilo_men.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="styles/modal.css">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="home.php" class="enlace">
            <img src="img/log.png" alt="" class="logo">
        </a>
        <ul>
            <li><a href="vistaProductos.php">Ver Productos</a></li>
            <li><a href="form_vale.php">Vale</a></li>
            <li><a href="form_sol_bodega.php">Solicitud a Bodega</a></li>
            <li><a href="form_sol_almacen.php">Solicitud a Almacen</a></li>
            <li><a href="form_sol_compra.php">Solicitud de compra</a></li>
            <li><a href="form_sol_circulante.php">Solicitud de fondo circulante</a></li>
            

         <div class="modal">
        <div class="modal-content">
            <p class="close-modal">
                <i class="fas fa-times"></i>
            </p>
            <div class="title">Perfil</div>
             <img src="img/logo1.png" style="width: 25%;">
            <div id="Perfil">
                
                <table id="table">
                    
                
<?php
    $cliente =$_SESSION['signin'];
    $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
    while ($consulta =mysqli_fetch_array($data)) {
?>
                <tr>
                    
                    <p style="color: #fff"><b>Usuario:</b> <?php  echo $consulta['username'];?></p>
                </tr>
                <tr>
                    <p style="color: #fff"><b>Nombre:</b> <?php echo $consulta['firstname'];?></p>
                </tr>
                <tr>
                    <p style="color: #fff"><b>Apellidos:</b> <?php echo $consulta['lastname'];?></p>
                </tr>
                <tr>
                    
                    <p style="color: #fff"><b>Email:</b><?php echo $consulta['email'];?></p>
                </tr>
<?php } ?>
               </table>
          
              </div>
            <style type="text/css">
                #Perfil{
                    margin-top: -20%;
                    margin-left: 27%;
                    color: #000;
            }
            
            </style>
            <div class="actions">
                <button><a href="logout.php">Cerrar Sesion</a></button>
            </div>
        </div>
    </div>

    <button class="open-modal" style="margin-right: 2%; margin-left: 8%">Perfil</button>

    <script>
        var btnOpen = document.querySelector('.open-modal');
        var btnClose = document.querySelector('.close-modal');
        var modal = document.querySelector('.modal');
        var toggleOpenClose = () => {
            modal.classList.toggle('opened')
        }

        btnOpen.addEventListener('click', toggleOpenClose);
        btnClose.addEventListener('click', toggleOpenClose);

    </script>
        </ul>
    </nav>
    <section></section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    
</body>
</html>