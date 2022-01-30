
<?php
include("Model/conexion.php");
if(!isset($_SESSION['signin'])){
    header("location: ../log/signin.php");
}
$tipo_usuario = $_SESSION['tipo_usuario'];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/estilo_men.css">
   <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
      <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
</head>

<body style="background-image: url(img/t.jpg);  
            background-repeat: no-repeat;
            background-attachment: fixed;">

    <style type="text/css">
        #a:hover{
   text-decoration: none;
   color: lawngreen;
}
 #b:hover{
   text-decoration: none;
   color:whitesmoke;
}
.children{
background:burlywood;
}
 </style>
      <header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="fas fa-bars"></span>Menú</a>
        </div>

        <nav>
            <ul>
                <li><a id="a" href="home.php"><span class="icon-house"></span>Inicio</a></li>
                
                    <li class="submenu">
                    <a id="a" href="#"><span class="icon-rocket"></span>Articulos<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                       <li><a id="b" href="vistaProductos.php">Ver Artículos</a></li>
                        <li><a id="b" href="regi_producto.php">Nuevo Artículo</a></li>
                        <li><a id="b" href="reporte_ingresos.php">Reporte Ingresos</a></li>
                        <li><a id="b" href="reporte_egresos.php">Reporte Egresos</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a id="a" href="#"><span class="icon-rocket"></span>Soli. Vale<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_vale.php">Mostrar</a></li>
                        <li><a id="b" href="form_vale.php">Nuevo</a></li>
                    </ul>
                </li>
                
                <li class="submenu">
                    <a id="a" href="#"><span class="icon-rocket"></span>Soli. Bodega<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_bodega.php">Mostrar</a></li>
                        <li><a id="b" href="form_bodega.php">Nuevo</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a id="a" href="#"><span class="icon-rocket"></span>Soli. Compra<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_compra.php">Mostrar</a></li>
                        <li><a id="b" href="form_compra.php">Nuevo</a></li>
                    </ul>
                </li>
                
                <li class="submenu">
                    <a id="a" href="#"><span class="icon-rocket"></span>Soli. Almacen<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_almacen.php">Mostrar</a></li>
                        <li><a id="b" href="form_almacen.php">Nuevo</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a id="a" href="#"><span class="icon-rocket"></span>Soli. Circulante<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_circulante.php">Mostrar</a></li>
                        <li><a id="b" href="form_circulante.php">Nuevo</a></li>
                    </ul>
                </li><?php if($tipo_usuario == 1) { ?>
                 <li class="submenu">
                    <a id="a" href="#"><span class="icon-rocket"></span>Empleados<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="Empleados.php">Mostrar</a></li>
                    </ul>
                </li>

                <?php }?>

               <?php
    $cliente =$_SESSION['signin'];
    $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
    while ($consulta =mysqli_fetch_array($data)) {
?>  
    <button class="btn" data-toggle="modal" data-target="#info" style=" background:transparent;float: right;margin-top: 1%; color: white;"><?php echo $consulta['username'];?> <i class="bi bi-caret-down-fill"></i></button>
<!-- Delete -->
<div class="modal fade" id="info" style="background: rgba(0, 0, 0, 0.3);" id="form" data-backdrop="static"  tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-image: linear-gradient(90deg, rgb(5, 114, 72), rgb(42, 136, 136));color: white; position: initial; z-index: 1000px;">
            <div class="modal-header">
                <h5 class="modal-title" style="color:white;">Información del Usuario</h5>
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
                    
                    <p style="color: #fff">Establecimiento:<br> <?php echo $consulta['Establecimiento'];?></p>
                </tr>
                <tr>
                    
                    <p style="color: #fff">Unidad: <?php echo $consulta['unidad'];?></p>
                </tr>

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
                <button data-toggle="modal" data-target="#Usuario_Contraseña" class="btn btn-info" >Cambiar Usuario y Contraseña</button>

        <a href="log/logout.php" type="submit" id="Update" class="btn btn-danger" >Cerrar Sesión</a>
      </div>
           
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="Usuario_Contraseña" style="background: rgba(0, 0, 0, 0.3);" id="form" data-backdrop="static"  tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-image: linear-gradient(1deg, rgb(5, 114, 72), rgb(42, 136, 136));color: white; position: initial; z-index: 1000px;">
            <div class="modal-header">
                <h5 class="modal-title" style="color:white;">Cambiando Información del Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
              <div class="modal-body">
                <p><b class="text-danger">NOTA IMPORTANTE:</b> Al Cambiar el Usuario va a tener que ingresar de nuevo con el nuevo Usuario y Contraseña</p>
                <form action="log/logout_Empleado.php" method="POST" style="margin: 1%;background: transparent;">
                    <input class="form-control" type="hidden" name="usuario" value="<?php echo $consulta['username'] ?>">
                    <div class="form-group">
                        <label>Nuevo Usuario</label>
                        <input class="form-control" type="text" name="Nusuario">
                    
                        <label>Nueva Contraseña</label>
                        <input class="form-control" type="text" name="Npassword">
                    </div>
                
                     </div>
            <div class="modal-footer">

        <button type="submit" id="Update" class="btn btn-danger" >Cambiar datos</button>
      </div>
          </form>
        </div>
    </div>
</div>
         <?php } ?>
            </ul>
        </nav>
    </header>
    <script src="Plugin/bootstrap/js/jquery.slim.min.js"></script>
   
    <script src="Plugin/bootstrap/js/bootstrap.min.js"></script>
   
    <script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
    $(document).ready(main);

var contador = 1;

function main () {
    $('.menu_bar').click(function(){
        if (contador == 1) {
            $('nav').animate({
                left: '0'
            });
            contador = 0;
        } else {
            contador = 1;
            $('nav').animate({
                left: '-100%'
            });
        }
    });

    // Mostramos y ocultamos submenus
    $('.submenu').click(function(){
        $(this).children('.children').slideToggle();
    });
}
</script>
    
</body>
</html>