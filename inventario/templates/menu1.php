
<?php
include("../../Model/conexion.php");

if(!isset($_SESSION['signin'])){
    header("location: ../../log/signin.php");
}
include ('../../Include/Empleados/Empleados.php');
$tipo_usuario = $_SESSION['tipo_usuario'];
$idusuario = $_SESSION['iduser'];
$cliente =$_SESSION['signin'];
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../styles/estilo_men.css">
    <link rel="stylesheet" type="text/css" href="../../styles/estilos_tablas.css"> 
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/datatables.min.css"/> 
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/select.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/rowGroup.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/colReorder.dataTables.min.css">

    <link rel="icon" type="image/png" sizes="32x32"  href="../../img/log.png">
</head>

<body style="background-image: url(../../img/camion.jpg); 
background-size: 100% 100%,100%;background-repeat: no-repeat;background-position: center;background-attachment: fixed;">

<style type="text/css">
    #a{padding: 20px 10px;}
    #info{font-size: 12px;height: 97%;}
    #a:hover{text-decoration: none;color: lawngreen;transition: 1s;transform: translateY(2px);}
    #b:hover{text-decoration: none;color:lawngreen;}
    .children{background:burlywood;}
    .btn{transition: 1s;}
    #button{color: white;}
    #button:hover{transform: translateY(2px);transition: 1s;color: lawngreen;}
    #wwe{margin: 1%;position: initial;}

    #sn{font-size: 1.5em;}
    .menu_bar2{display: none;}
    #vale{display: none;}
    @media (max-width: 800px){.bi{float: right;}#buscar1{float: right;display: block;margin-top: 3%;margin-bottom: 3%}  #vale{display: block;} .nav1{display: none;}}

    body{background: black;}

    .menu_bar2{display: none;}

    .nav1{background: #023859;border-bottom-right-radius: 100%;width: 6%;padding: 1%;height: 11%;position: fixed;z-index: 10000;margin-left: -6%;}
</style>
<div class="nav1" title="Mostrar el menu">
    <svg class="bi nav2 mx-2 text-white" width="30" height="30" fill="currentColor" >
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#list"/>
    </svg>
</div>
<header id="navbar" >
    <div class="menu_bar">
        <a style="font-size: 2rem;" href="#" class="bt-menu">

            <svg  class="bi menu_bar1" width="50" height="50" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#list"/>
            </svg>
            <svg  class="bi menu_bar2" width="50" height="50" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#x"/>
            </svg>
            <p>Menú</p></a>
        </div>

        <nav >
            <ul>
                <li><a id="a" href="../../home.php"><span>
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#house"/>
                    </svg></span> Inicio</a></li>

                    <li class="submenu">
                        <a id="a" href="#">Articulos 
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                            </svg></a>
                            <ul class="children">
                               <li><a id="b" href="../Productos/vistaProductos.php">Ver Artículos</a></li>
                               <?php if($tipo_usuario==1){ ?>
                                <li><a id="b" href="../Productos/regi_producto.php">Nuevo Artículo</a></li>
                            <?php } ?>
                            <li  class="submenu1 " ><a id="b" href="#">Reportes Ingresos
                                <svg class="bi rotate " width="20" height="20" fill="currentColor">
                                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                                </svg></a>
                                <ul class="submenu2">
                                    <li><a href="../Reportes/reporte_ingresos.php?ingresos=circulante">Reporte Circulante</a></li>
                                    <li><a href="../Reportes/reporte_ingresos.php?ingresos=compra">Reporte Compra</a></li>
                                    <li><a href="../Reportes/reporte_ingresos.php?ingresos=almacen">Reporte Almacen</a></li>
                                </ul>
                            </li>
                            <li class="submenu1"><a id="b" href="#">Reportes Egresos
                                <svg class="bi" width="20" height="20" fill="currentColor">
                                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                                </svg></a>
                                <ul class="submenu2">
                                    <li><a href="../Reportes/reporte_egresos.php?ingresos=vale">Reporte Vale</a></li>
                                    <li><a href="../Reportes/reporte_egresos.php?ingresos=bodega">Reporte Bodega</a></li>
                                </ul>
                            </li>
                            <?php if ($tipo_usuario==1) {?>
                               <li class="submenu1 submenu5"><a id="b" href="#" onclick="return codigo_fecha()">Buscador al Producto</a>
                               </li>
                           <?php } ?>
                       </ul>
                   </li>
                   <li class="submenu">
                    <a id="a" href="#">Soli. Vale
                        <svg class="bi" width="20" height="20" fill="currentColor">
                            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="../Vale/solicitudes_vale.php">Mostrar</a></li>
                        <li><a id="b" href="../Vale/form_vale1.php">Seleccionar varios</a></li>
                    </ul>
                </li>
                
                <li class="submenu">
                    <a id="a" href="#">Soli. Bodega
                        <svg class="bi" width="20" height="20" fill="currentColor">
                            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="../Bodega/solicitudes_bodega.php">Mostrar</a></li>
                        <li><a id="b" href="../Bodega/form_bodega_varios.php">Seleccionar varios</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a id="a" href="#">Soli. Compra
                        <svg class="bi" width="20" height="20" fill="currentColor">
                            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="../Compra/solicitudes_compra.php">Mostrar</a></li>
                        <li><a id="b" href="../Compra/form_compra1.php">Seleccionar varios</a></li>
                    </ul>
                </li>
                
                <li class="submenu">
                    <a id="a" href="#">Soli. Almacen
                        <svg class="bi" width="20" height="20" fill="currentColor">
                            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="../Almacen/solicitudes_almacen.php">Mostrar</a></li>
                        <li><a id="b" href="../Almacen/form_almacen1.php">Seleccionar varios</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a id="a" href="#">Soli. Circulante
                        <svg class="bi" width="20" height="20" fill="currentColor">
                            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="../Circulante/solicitudes_circulante.php">Mostrar</a></li>
                        <li><a id="b" href="../Circulante/form_circulante1.php">Seleccionar varios</a></li>
                    </ul>
                </li>
                <li class="submenu" >
                    <a id="a" href="#">Empleados
                        <svg class="bi" width="20" height="20" fill="currentColor">
                            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="../Empleados/Empleados.php">Mostrar</a></li>
                    </ul>

                </li>

                <?php

                $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
                while ($consulta =mysqli_fetch_array($data)) {
                    ?>  

                    <li class="submenu submenu4" >
                        <div id="button" style="padding: 10px;" class="btn  text-white" data-toggle="modal" data-target="#info" style=" background:transparent;text-align: center;"  >
                            <svg class="bi1" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#person-circle"/>
                            </svg>
                            <?php echo $consulta['username'];?> 
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                            </svg>
                        </div>
                    </li>

                    <?php if ($cliente=="egchoto") { ?>
                        <li class="submenu" >

                            <button title="Respaldo de la base de datos completa" id="b" onclick="return Exportar_bd()" class="btn btn-outline-primary"  style="position: initial; margin-top: 1%; margin-bottom: 1%; font-size: 12px;">Exportar bd</button>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </header>
        <!-- Delete -->
        <div class="modal fade" id="info" style="background: rgba(0, 0, 0, 0.3);" id="form" data-backdrop="static"  tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" style="background-image: linear-gradient(90deg, rgb(5, 114, 72), rgb(42, 136, 136));color: white; position: initial; z-index: 1000px;">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:white;">Información del Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">
                              <svg class="bi" width="30" height="30" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#backspace-fill"/>
                            </svg>
                        </span>
                    </button>
                </div>
                <div id="info" class="modal-body">
                    <div class="card mb-3" style="max-width: 540px;background: transparent;border: none;">
                      <div  class="row no-gutters">
                        <div class="col-md-4">
                            <svg class="bi text-white my-5" width="150" height="150" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#person-circle"/>
                            </svg>
                        </div>
                        <div style="background: transparent;"class="col-md-8">
                          <div  class="card-body" style="justify-items: center;">
                            <div class="row">
                                <div class="col-md-12">
                                    <p id="sn" style="color: #fff"><b>Usuario:</b> <?php  echo $consulta['username'];?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                   <p id="sn" style="color: #fff"><b>Nombre:</b> <?php echo $consulta['firstname'];?></p>
                               </div>
                           </div>

                           <div class="row">
                            <div class="col-md-12">
                                <p id="sn" style="color: #fff"><b>Apellidos:</b> <?php echo $consulta['lastname'];?></p>
                            </div>
                            <div class="col-md-12">
                                <p id="sn" style="color: #fff"><b>Establecimiento:</b> <?php echo $consulta['Establecimiento'];?></p> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p id="sn" style="color: #fff"><b>Unidad ó Departamento:</b> <?php echo $consulta['unidad'];?></p>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
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
        <button data-toggle="modal" data-target="#Usuario_Contraseña" class="btn btn-info" onclick="return usuario()">Cambiar Usuario y Contraseña
            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#person-circle"/>
            </svg>
        </button>

        <a href="../../log/logout.php" type="submit" id="Update" onclick="return confirmaion1()" class="btn btn-danger"?>Cerrar Sesión 
            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#box-arrow-right"/>
            </svg></a>
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
            <p><b class="text-danger">NOTA IMPORTANTE:</b> Al Cambiar el Usuario va a tener que ingresar el nuevo Usuario y Contraseña</p>
            <form action="log/logout_Empleado.php" method="POST" style="margin: 1%;background: transparent;">
                <input class="form-control" type="hidden" name="usuario" value="<?php echo $consulta['username'] ?>">
                <div class="form-group">
                    <label style="color:white;">Usuario Actual</label>
                    <b><p style="stroke: white;"><?php echo $consulta['username'] ?></p></b>
                    <label>Nuevo Usuario</label>
                    <input class="form-control"  required type="text" name="Nusuario">
                    
                    <label>Nueva Contraseña</label>
                    <input class="form-control" required  type="text" name="Npassword">
                </div>
                
            </div>
            <div class="modal-footer">

                <button type="submit" id="Update" class="btn btn-danger" >Cambiar datos</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<?php     
include('../../Include/Modal/modal1.php') ?>

<?php } ?>

<script src="../../Plugin/bootstrap/js/jquery-latest.js"></script>
<script src="../../Plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../Plugin/bootstrap/js/popper.min.js"></script>
<script src="../../Plugin/bootstrap/js/bootstrap.min.js"></script>

<script src="../../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>

<script src="../../Plugin/bootstrap/js/datatables.min.js"></script>
<script src="../../Plugin/bootstrap/js/dataTables.select.min.js"></script>
<script src="../../Plugin/bootstrap/js/dataTables.rowGroup.min.js"></script>
<script src="../../Plugin/bootstrap/js/dataTables.responsive.min.js"></script>
<script src="../../Plugin/bootstrap/js/responsive.bootstrap4.min.js"></script>
<script src="../../Plugin/bootstrap/js/dataTables.colReorder.min.js"></script>
<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()

  })
     $(function () {
      $('[data-toggle="popover"]').popover({animation:true})

  })
    // Mostramos y ocultamos submenus
    $('.submenu').click(function(){
        $(this).children('.children').slideToggle();
    });
    $( ".submenu1").click(function() {
        $(this).children("ul").slideToggle();
    });


    $(".submenu1").click(function(p) {
       p.stopPropagation();
   });
    $('.p1').hide();
    $('.p').click(function(){
        $(".div").removeClass("div");
        $('.p').hide();
        $('.p1').show();

    });
    $('.p1').click(function(){

        $(".div1").addClass("div");
        $('.p1').hide();
        $('.p').show();
    });


//  $('.nav1').css({"margin-left": "-6%", "transition": "3s"});     

//  let ubicacionPrincipal=window.pageYOffset;
//  window.onscroll= function() {
//     let Desplazamiento_Actual=window.pageYOffset;
//     if (ubicacionPrincipal >= Desplazamiento_Actual) {
//         document.getElementById('navbar').style.top='0';

//         $('.nav1').css({"margin-left": "-6%", "transition": "3s"});   


//     }else{
// //entra el nav1
//         $('.nav1').css({"margin-left": "-1%", "transition": "3s"});  

//         $('.nav2').click(function(){
//             $('.nav1').css({"margin-left": "-6%", "transition": "3s"});   
//             document.getElementById('navbar').style.top='0';
//         });   
//         $('#navbar').css({"top": "-200px", "transition": "1.5s"});  

//     }
//     ubicacionPrincipal=Desplazamiento_Actual;
// }

    $(document).ready(main);
    var contador = 1;

    function main () {
        $('.menu_bar1').click(function(){
            $('.menu_bar1').hide();
            $('.menu_bar2').show();

            if (contador == 1) {
                $('nav').animate({
                    left: '0'
                });
                contador = 0;
            } else {
                $('.menu_bar1').show();
                contador = 1;
                $('nav').animate({
                    left: '-100%'
                });
            }
        });
        $('.menu_bar2').click(function(){
            $('.menu_bar2').hide();

            if (contador == 1) {
                $('nav').animate({
                    left: '0'
                });
                contador = 0;
            } else {
                $('.menu_bar1').show();
                contador = 1;
                $('nav').animate({
                    left: '-100%'
                });
            }
        });


    }
</script>
<script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
  })
    function confirmaion1(e) {
        Swal.fire({
          icon: 'warning',
          text: 'Seguro que deseas Cerrar Session',
          showCancelButton:true,
          confirmButtonText: 'Cerrar Session',
          footer: 'Sistema De Inventario',
          allowOutsideClick: false,
      }).then((resultado) =>{
        if (resultado.value) {
           const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

           Toast.fire({
            icon: 'success',
            title: 'Cerrando Session',
        }).then((result) => {
  /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.href='../../log/logout.php';
        }
    })
    }
});
      return false;
  }
</script>

<script type="text/javascript">
    function confirmaion2(e) {
        if (confirm("¿Estas seguro que deseas Rechazar la Solicitud?")) {
            return true;
        } else {
            return false;
            e.preventDefault();
        }
    }
    function Exportar_bd() {
        Swal.fire({
          title:'NOTA IMPORTANTE:',
          text:'Este Momento Va a Hacer un Respaldo de la Base de Datos',
          icon:'warning',
          confirmButtonText: "Exportar",
          showCancelButton:true,
          allowOutsideClick: false
      }).then((resultado) =>{
        if (resultado.value) {
            window.location.href='../../Database/Respaldos_sql/Respaldos.php';                               
        }
    });
      return false;
  }
</script>
<style type="text/css">

    .lds-ring {
      display: inline-block;
      position: relative;
      width: 80px;
      height: 80px;
  }
  .lds-ring div {
      box-sizing: border-box;
      display: block;
      position: absolute;
      width: 64px;
      height: 64px;
      margin: 8px;
      border: 8px solid #fff;
      border-radius: 50%;
      animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
      border-color: #fff transparent transparent transparent;
  }
  .lds-ring div:nth-child(1) {
      animation-delay: -0.45s;
  }
  .lds-ring div:nth-child(2) {
      animation-delay: -0.3s;
  }
  .lds-ring div:nth-child(3) {
      animation-delay: -0.15s;
  }
  @keyframes lds-ring {
      0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
.loader{
    background: #000;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 10000;
    clip-path: circle(150%, at 100% 0);
    transition: clip-path 0.8s ease-in-out;
}
.loader2{
    display: none;
}

:root {
  --effect: hover 1s linear infinite;
}



#loader {
  display: inline-block;
  text-transform: uppercase;
  text-align: center;
  font-size: 4em;
  font-family: arial;
  font-weight: 600;
  transform: scale(.5);
  color: #121212;
  -webkit-text-stroke: 2px gray;
  z-index: 10000000;
  overflow: hidden;
}

#loader:nth-child(1) {
  animation: var(--effect);
}

#loader:nth-child(2) {
  animation: var(--effect) .125s;
}

#loader:nth-child(3) {
  animation: var(--effect) .25s;
}

#loader:nth-child(4) {
  animation: var(--effect) .375s;
}

#loader:nth-child(5) {
  animation: var(--effect) .5s;
}

#loader:nth-child(6) {
  animation: var(--effect) .675s;
}

#loader:nth-child(7) {
  animation: var(--effect) .75s;
}

@keyframes hover {
  0% {
    transform: scale(.5);
    color: #121212;
    -webkit-text-stroke: 2px gray;
}

20% {
    transform: scale(1);
    color: pink;
    -webkit-text-stroke: 3px red;
    filter: drop-shadow(0 0 1px black)drop-shadow(0 0 1px black)drop-shadow(0 0 3px red)drop-shadow(0 0 5px red)hue-rotate(10turn);
}

50% {
    transform: scale(.5);
    color: #121212;
    -webkit-text-stroke: 2px gray;
}


}

</style>
<!-- loader de circulo -->
<!-- <div class="lds-ring loader" id="loader"><div></div><div></div><div></div><div></div></div> -->
<div class="loader" style="overflow: hidden;">
  <p id="loader">l</p>
  <p id="loader">o</p>
  <p id="loader">a</p>
  <p id="loader">d</p>
  <p id="loader">i</p>
  <p id="loader">n</p>
  <p id="loader">g</p>
</div>
<script type="text/javascript">


    $(window).on('load', function () {
        $('.loader').delay(1000).fadeOut('slow');

    });

</script>
</body>
</html>