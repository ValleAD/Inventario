<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../styles/estilo_men.css">
    <link rel="stylesheet" type="text/css" href="../../styles/estilos_tablas.css">
   <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/datatables.min.css"/> 
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
                    <li><a id="a" href="home.php"><span>
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
                        
                        
                        <li><a id="b" href="form_vale.php">Buscar por código</a></li>
                        <li><a id="b" href="form_vale1.php">Seleccionar Varios</a></li>
                    </ul>
                </li>
                 
                    <div class="dropdown">
                      <div class="dropbtn"><svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#person"/>
                        </svg> Invitado<svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                        </svg></div>
                      <div class="dropdown-content">
                        <a onclick="return confirmaion()"  href="logout_invitado.php">Cerrar Session</a>
                      </div>
                    </div>
                 
            </ul>
        </nav>
    </header>
    <script src="../../Plugin/bootstrap/js/jquery-latest.js"></script>
    <script src="../../Plugin/bootstrap/js/datatables.min.js"></script>
    <script src="../../Plugin/bootstrap/js/bootstrap.min.js"></script>
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

</body>
</html>

