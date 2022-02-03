
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../styles/estilo_men.css">
   <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
      <link rel="icon" type="image/png" sizes="32x32"  href="../../img/log.png">
</head>

<body style="background-image: url(../../img/4k.jpg);  
            background-repeat: no-repeat;
            background-attachment: fixed; color: aqua;">

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
                <li>
                    <a id="b" href="invitado.php"><span class="icon-house"></span>Inicio</a></li>
                   
                </li>
                <li class="submenu">
                    <a id="b" href="#"><span class="icon-rocket"></span>Articulos<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="vale/productos.php">Nuevo</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a id="b" href="#"><span class="icon-rocket"></span>Solicitud Vale<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="vale/form_vale.php">Nuevo</a></li>
                    </ul>
                </li>
                 <li class="submenu" style="float:right;">
                    <a id="a" href="#"><span class="icon-rocket"></span><i class="bi bi-person"></i> Invitado<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="logout_invitado.php">Cerrar Session</a></li>
                        
                    </ul>
                </li>
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