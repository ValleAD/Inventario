<?php
session_start();
$invitado = $_SESSION['Invitado1'];
$tipo_usuario = $_SESSION['tipo_usuario1'];
?><!DOCTYPE html>
<html lang="en">
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
      <link rel="icon" type="image/png" sizes="32x32"  href="../../img/log.png">
</head>

<body style="background-image: url(../../img/4k.jpg);  
background-size: 100% 100%,100%;
            background-repeat: no-repeat;
            background-attachment: fixed;">

    <style type="text/css">
        .dropbtn {
  background-color: transparent;
  color: white;
  padding: 20px;
  font-size: 16px;
  border: none;
}

.dropdown {
    float: right;
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
         @media (max-width: 800px){
        body{
            background: black;
        }
    }
        #a{
            padding: 20px 10px;
            transition: 1s;
        }
        #b{
            transition: 1s;
        }
        #info{
            font-size: 12px;
            height: 97%;
        }
        #a:hover{
   text-decoration: none;
   color: lawngreen;
    transition: 1s;
    transform: translateY(2px);
   
}
 #b:hover{
   text-decoration: none;
   color:lawngreen;
   transition: 2s;
}
.children{
background:burlywood;
}
.btn{
   transition: 1s;
}
#button{
    color: white;
}
#button:hover{
    transform: translateY(2px);
   transition: 1s;
   color: lawngreen;
}
.btn:hover {
    transform: translateY(2px);
   transition: 1s;
   color: lawngreen;
}
        h1{
            color: rgba(555, 555, 555, 1);
            margin: 5% 5% 0% 5%;
            max-height: 100%;
            transition: 5s;
            border-radius: 5px;
            text-shadow: 1px 1px 5px black;
            }
 </style>
 <header>
        <div class="menu_bar">
            <a style="font-size: 2rem;" href="#" class="bt-menu"><span>
                <svg class="bi" width="70" height="70" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#list"/>
                </svg>
            </span><p>Menú</p></a>
        </div>

        <nav>
            <ul>
                <li>
                    <li><a id="a" href="invitado.php"><span>
                    <svg style="margin-top: -10%;" class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#house"/>
                        </svg></span> Inicio</a></li>
                   
                </li>
                <li class="submenu">
                    <a id="a" href="#">Articulos <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg></a>
                    <ul class="children">
                        <li><a id="b" href="productos.php">Mostrar</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a id="a" href="#">Solicitud Vale <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg></a>
                    <ul class="children">
                    <li><a id="b" href="solicitudes_vale.php">Mostrar</a></li>
                        
                        
                       <!--  <li><a id="b" href="form_vale.php">Buscar por código</a></li> -->
                        <li><a id="b" href="form_vale1.php">Seleccionar Varios</a></li>
                    </ul>
                </li>
                 
                    <div class="dropdown">
                      <div class="dropbtn"><svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#person"/>
                        </svg> <?php echo $invitado; ?><svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg></div>
                      <div class="dropdown-content">
                        <a onclick="return confirmaion()" >Cerrar Session</a>
                      </div>
                    </div>
                 
            </ul>
        </nav>
    </header>
    <script src="../../Plugin/bootstrap/js/jquery-latest.js"></script>
    <script src="../../Plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>

    <script src="../../Plugin/bootstrap/js/datatables.min.js"></script>
    <script src="../../Plugin/bootstrap/js/dataTables.select.min.js"></script>
    <script src="../../Plugin/bootstrap/js/dataTables.rowGroup.min.js"></script>
    <script src="../../Plugin/bootstrap/js/dataTables.responsive.min.js"></script>
    <script src="../../Plugin/bootstrap/js/responsive.bootstrap4.min.js"></script>
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
        Swal.fire({
  icon: 'warning',
  text: 'Seguro que deseas Cerrar Session',
  showCancelButton:true,
  confirmButtonText: 'Cerrar Session',
  footer: 'Sistema De Inventario',
  allowOutsideClick: false,
}).then((resultado) =>{
if (resultado.value) {
    window.location.href='logout_invitado.php';
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

