
<?php
include("Model/conexion.php");
if(!isset($_SESSION['signin'])){
    header("location: log/signin.php");
}
$tipo_usuario = $_SESSION['tipo_usuario'];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/estilo_men.css">
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
   <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/datatables.min.css"/> 

      <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
</head>

<body style="background-image: url(img/camion.jpg);  
            background-repeat: no-repeat;
            background-attachment: fixed;">

    <style type="text/css">
        #a{
            padding: 20px 10px;
        }
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
            <a style="font-size: 2rem;" href="#" class="bt-menu"><span>
                <svg class="bi" width="70" height="70" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#list"/>
                </svg>
            </span><p>Menú</p></a>
        </div>

        <nav>
            <ul>
                <li><a id="a" href="home.php"><span>
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#house"/>
                        </svg></span>Inicio</a></li>
                
                    <li class="submenu">
                    <a id="a" href="#">Articulos 
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg></a>
                    <ul class="children">
                       <li><a id="b" href="vistaProductos.php">Ver Artículos</a></li>
                       <?php if($tipo_usuario==1){ ?>
                        <li><a id="b" href="regi_producto.php">Nuevo Artículo</a></li>
                    <?php } ?>
                        <li><a id="b" href="reporte_ingresos.php">Reporte Ingresos</a></li>
                        <li><a id="b" href="reporte_egresos.php">Reporte Egresos</a></li>
                        <li><a id="b" href="reporte_productos.php">Reporte Productos</a></li>
                        <li><a id="b" href="reporte_general.php">Reporte General</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a id="a" href="#">Soli. Vale
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_vale.php">Mostrar</a></li>
                        <li><a id="b" href="form_vale.php">Buscar por código</a></li>
                        <li><a id="b" href="form_vale1.php">Seleccionar varios</a></li>
                        <!-- <li><a id="b" href="form_vale_anterior.php">Vale anterior</a></li> -->
                    </ul>
                </li>
                
                <li class="submenu">
                    <a id="a" href="#">Soli. Bodega
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_bodega.php">Mostrar</a></li>
                        <li><a id="b" href="form_bodega.php">Buscar por codigo</a></li>
                        <li><a id="b" href="form_bodega_varios.php">Seleccionar varios</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a id="a" href="#">Soli. Compra
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_compra.php">Mostrar</a></li>
                        <li><a id="b" href="form_compra.php">Nuevo</a></li>
                    </ul>
                </li>
                
                <li class="submenu">
                    <a id="a" href="#">Soli. Almacen
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_almacen.php">Mostrar</a></li>
                        <li><a id="b" href="form_almacen.php">Nuevo</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a id="a" href="#">Soli. Circulante
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_circulante.php">Mostrar</a></li>
                        <li><a id="b" href="form_circulante.php">Nuevo</a></li>
                    </ul>
                </li>
                 <li class="submenu" >
                    <a id="a" href="#">Empleados
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
                    </a>
                    <ul class="children">
                        <li><a id="b" href="Empleados.php">Mostrar</a></li>
                    </ul>
                </li>
               <?php
    $cliente =$_SESSION['signin'];
    $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
    while ($consulta =mysqli_fetch_array($data)) {
?>  
    <button class="btn" data-toggle="modal" data-target="#info" style=" background:transparent;float: right;margin-top: 1%; color: white;" ><?php echo $consulta['username'];?> 
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg>
</button>
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
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#backspace-fill"/>
                        </svg>
                  </span>
                </button>
            </div>
              <div class="modal-body">
                <div class="card mb-3" style="max-width: 540px;background: transparent;border: none;">
  <div  class="row no-gutters">
    <div class="col-md-4">
                        <svg class="bi text-white my-5" width="150" height="150" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#person-circle"/>
                        </svg>
    </div>
    <div style="background: transparent;"class="col-md-8">
      <div  class="card-body">
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
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#person-circle"/>
                        </svg>
                </button>

        <a href="log/logout.php" type="submit" id="Update" class="btn btn-danger" onclick="return confirmaion()">Cerrar Sesión 
        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#box-arrow-right"/>
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
         <?php } ?>

       
    <script src="Plugin/bootstrap/js/jquery-latest.js"></script>
    <script src="Plugin/bootstrap/js/datatables.min.js"></script>
    <script src="Plugin/bootstrap/js/bootstrap.min.js"></script>
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
        <script type="text/javascript">
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Cerrar Session ")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
</script>
    <script type="text/javascript">
function usuario(e) {
    if (confirm("Deseas cambiar el Usuario y Contraseña")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
</script>
  <script>
   $(document).ready(function(){
 $('#example').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: 'rtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]           
    });     

    });
</script> <script>
   $(document).ready(function(){
 $('#example1').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: 'rtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]           
    });     

    });
</script> <script>
   $(document).ready(function(){
 $('#example2').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: 'rtilp',
        paging:false,     
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]           
    });     

    });
</script>
</body>
</html>