<?php
include("Model/conexion.php");
if(!isset($_SESSION['signin'])){
    header("location: log/signin.php");
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/estilo_menu.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
      <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
</head>
<body>
      <style type="text/css">
            #a:hover{
                background: transparent;
                    
                }
                


    @media (max-width: 952px){
    
       #Perfil{
                   margin-top: -15%;
                    margin-left: 15%;
                    color: #000;
            }
            nav{
                max-width: 100%;
            }
             img{
        display: flex;
        max-width:100%;
        min-width: 35%;
        align-items: center;
        padding: 30px;
        justify-content: center;
    }
  .btn{
    margin-right: 45%;
     }
}
</style>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a style="margin-left:-2.5%;margin-top: -1%; width: 1%;" href="home.php" class="enlace">
            <img src="img/log.png "  alt="" class="logo" width="60" height="65" >
        </a>
        <ul>
            <li><a id="a" href="vistaProductos.php">Ver Productos</a></li>
            <li><a id="a" href="form_vale.php">Vale</a></li>
            <li><a id="a" href="form_sol_bodega.php">Solicitud a Bodega</a></li>
            <li><a id="a" href="form_sol_almacen.php">Solicitud a Almacen</a></li>
            <li><a id="a" href="form_sol_compra.php">Solicitud de compra</a></li>
            <li><a id="a" href="form_sol_circulante.php">Solicitud de fondo circulante</a></li>
            
<?php
    $cliente =$_SESSION['signin'];
    $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
    while ($consulta =mysqli_fetch_array($data)) {
?>
    <button class="btn" data-toggle="modal" data-target="#delete" style="background:transparent;float: right;margin-top: 1%; color: white;"><?php echo $consulta['username'];?></button>
<!-- Delete -->
<div class="modal fade" id="delete" id="form" data-backdrop="static"  tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: hsla(0.5turn , 100% , 0.1% , 0.5 );color: white;">
            <div class="modal-header">
                <h5 class="modal-title">Información del Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
              <div class="modal-body">
    <img src="img/logo1.png" style="width: 25%;" id="img">
                <div id="Perfil">
                <table id="table">
                    
                

                <tr>
                    
                    <p style="color: #fff">Usuario: <?php  echo $consulta['username'];?></p>
                </tr>
                <tr>
                    <p style="color: #fff">Nombre: <?php echo $consulta['firstname'];?></p>
                </tr>
                <tr>
                    <p style="color: #fff">Apellidos: <?php echo $consulta['lastname'];?></p>
                </tr>
                <tr>
                    
                    <p style="color: #fff">Email: <?php echo $consulta['email'];?></p>
                </tr>
<?php } ?>
               </table>
          

              </div>
            <style type="text/css">
                #Perfil{
                    margin-top: -25%;
                    margin-left: 27%;
                    color: #000;
            }
            #img{
                margin-top: 5%;
            }
            
            </style>
            </div>
            <div class="modal-footer">
        <a href="log/logout.php" type="submit" id="Update" class="btn btn-danger" >Cerrar Seccion</a>
      </div>
           
        </div>
    </div>
</div>
</div>
        </ul>
    </nav>
    <script src="Plugin/bootstrap/js/jquery.slim.min.js"></script>
   
    <script src="Plugin/bootstrap/js/bootstrap.min.js"></script>
   

    
</body>
</html>