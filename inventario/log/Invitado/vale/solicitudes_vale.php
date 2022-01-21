
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../styles/estilo_men.css">
    <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
   <link rel="stylesheet" type="text/css" href="../../../Plugin/bootstrap/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
      <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
    <title>Solicitudes De Vale</title>
</head>
<body style="background-image: url(../../../img/4k.jpg);   
            background-repeat: no-repeat;
            background-attachment: fixed;">
     <header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="fas fa-bars"></span>Menú</a>
        </div>

        <nav>
            <ul>
                <li>
                    <a id="a" href="../invitado.php"><span class="icon-house"></span>Inicio</a></li>
                   
                </li>
                <li class="submenu">
                    <a id="b" href="#"><span class="icon-rocket"></span>Solicitud Vale<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_vale.php">Mostrar</a></li>
                       
                    </ul>
                </li>
                 <li class="submenu" style="float:right;">
                    <a id="b" href="#"><span class="icon-rocket"></span><i class="bi bi-person"></i> Invitado<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="../logout_invitado.php">Cerrar Session</a></li>
                        
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
     <div class="container">
        <table class="table">
            <center><h1 style="margin-top:5px">Solicitudes Vale</h1></center>
            <thead>
              <tr id="tr">
            
             
                <th class="table-info text-dark"><strong>Código de Vale</strong></th>
                <th class="table-info text-dark"><strong>Departamento Solicitante</strong></th>
                <th class="table-info text-dark"><strong>Fecha de solicitud</strong></th>
                <th class="table-info text-dark"><strong>Detalles</strong></th>
                
            </tr>
            <td id="td" colspan="4"><h4 align="center">No se encontraron ningun  resultados 😥</h4></td>
           
     </thead>
        <tbody>     
    <?php
    include '../../../Model/conexion.php';
    $sql = "SELECT * FROM tb_vale ORDER BY fecha_registro DESC";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
        <tr>
            <td data-label="Codigo" class="delete"><?php  echo $solicitudes['codVale']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo $solicitudes['fecha_registro']; ?></td>
            <td  data-label="Detalles">
                <a class="btn btn-primary swal2-styled.swal2-confirm" href="datos_vale.php">Ver detalles</a>
            </td>
        </tr>

           

<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->
            
       
          
 <?php } ?> 
           
           </tbody>
        </table>

    </div>
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
</body>
</html>