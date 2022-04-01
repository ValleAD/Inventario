<!DOCTYPE html>
<!--Es para la version de mobile-->
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

      @media (max-width: 952px){
    #section{
        margin-top: 5%;
        margin-left: 12%;
        width: 75%;
       }
    #lab{
        margin-left: 5%;

    }
    .w{
        margin-top: 5%;
    }
    #inp{
            margin-left: 10%;
    }  #inp1{
         margin-top: 2%;
          margin-left: 5%;
    }  #buscar{
         margin-top: 2%;
          margin-left: 25%;
          margin-bottom: 25%;
    }
    #btn{
        margin-top: 5%;
        margin-left: 35%;
        margin-bottom: 15%;
    }
    #buscar{
        margin-top: 5%;
        margin-left: 35%;
        margin-bottom: 15%;
        background: whitesmoke;
    }


      }
       form{
        background: whitesmoke;

        padding: 1%;
        border-radius: 7px;
    }
    #section{
        margin-top: 5%;
        margin-left: 12%;
        width: 75%;
       }
</style>

<html lang="en">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
         <link rel="stylesheet" type="text/css" href="../../../styles/estilo_men.css">
   <link rel="stylesheet" type="text/css" href="../../../Plugin/bootstrap/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
      <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">  
    <title>Vale</title>
</head> 
<body style="background-image: url(../../../img/4k.jpg);  
            background-repeat: no-repeat;
            background-attachment: fixed;">
             <style>
    table thead{
    background: linear-gradient(to right, #4A00E0, #8E2DE2); 
    color:white;
    }
    </style>
 <header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="fas fa-bars"></span>Menú</a>
        </div>

        <nav>
            <ul>
                <li>
                    <a id="b" href="../invitado.php"><span class="icon-house"></span>Inicio</a></li>
                   
                </li>
                <li class="submenu">
                    <a id="b" href="#"><span class="icon-rocket"></span>Articulos<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="productos.php">Nuevo</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a id="b" href="#"><span class="icon-rocket"></span>Solicitud Vale<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="form_vale.php">Nuevo</a></li>
                        <li><a id="b" href="solicitudes_vale.php">Mostrar</a></li>
                        <li><a id="b" href="form_vale1.php">Seleccionar Varios</a></li>
                    </ul>
                </li>
                 <li class="submenu" style="float:right;">
                    <a id="a" href="#"><span class="icon-rocket"></span><i class="bi bi-person"></i> Invitado<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="../logout_invitado.php">Cerrar Session</a></li>
                        
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

<?php

$total = 0;
$final = 0;

   include '../../../Model/conexion.php';
    $sql = "SELECT * FROM tb_vale ORDER BY fecha_registro DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){

    echo'   
    <section id="section">
    <form method="POST" action="Plugin/pdf_vale.php" target="_blank">
             
          
            <div class="row">
          
              <div class="col-6 col-sm-3" style="position: initial">
          
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <input readonly class="form-control"  type="text" value="' .$productos1['departamento']. '" name="depto">
    
              </div>
    
              <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">N° de Vale:</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['codVale']. '" name="vale">
              </div>
    
            <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['usuario']. '" name="usuario">
            </div>
    
              
              <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">Fecha:</label>
                  <input readonly class="form-control"  type="text" value="' .date("d-m-Y",strtotime($productos1['fecha_registro'])). '" name="fech">
              </div>';?>
               <div class="col-6 col-sm-3" style="position: initial">
                  <label style="font-weight: bold;">Estado</label>
                  <input <?php
                    if($productos1['estado']=='Pendiente') {
                        echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                    }
                ?> readonly class="form-control"  type="text" value="<?= $productos1['estado'] ?>" name="id"> 
                </div>
            </div>
          
            <br>
              
            <table class="table" style="margin-bottom:3%">
                
                <thead>
                  <tr id="tr">
                    <th>Código</th>
                    <th style="width: 35%;">Descripción</th>
                    <th>Unidad de Medida</th>
                    <th>Cantidad</th>
                    <th>Costo unitario</th>
                    <th>Total</th>
                  </tr>
                    <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
               </thead>
                <tbody>
                    <?php 
    
    $num_vale = $productos1['codVale'];
    }
     $sql = "SELECT * FROM detalle_vale WHERE numero_vale = $num_vale";
        $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
          
            $total    =    $productos['stock'] * $productos['precio'];
            $final    +=   $total;
            $precio   =    $productos['precio'];
            $cantidad =    $productos['stock'];
            $precio2  =    number_format($precio, 2,".",",");
            $total2   =    number_format($total, 2, ".",",");
            $final2   =    number_format($final, 2, ".",",");  
            $stock=number_format($cantidad, 2,".",",");
            echo' 
        <style type="text/css">
         #td{
            display: none;
        }
        
       
    </style> 
          <tr>
            <td  data-label="Código"><input style="background:transparent; border: none; width: 100%;"  name="cod[]" readonly value="' .$productos['codigo']. '"></td>
            <td  data-label="Descripción"><textarea style="background:transparent; border: none; width: 100%;"  name="desc[]" readonly style="border: none">'.$productos['descripcion']. '</textarea></td>
            <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%;" name="um[]" readonly value="'.$productos['unidad_medida']. '"></td>
            <td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%;"  name="cant[]" readonly value="'.$stock. '"></td>
            <td  data-label="Costo unitario"><input style="background:transparent; border: none; width: 100%;"  name="cost[]" readonly value="$'.$precio2.'"></td>
            <td  data-label="total"><input style="background:transparent; border: none; width: 100%;"  name="tot[]" readonly value="$'.$total2. '"></td>
            
          </tr>';
    
    }
    
          echo'
          <th colspan="5">SubTotal</th>
          <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" readonly value="$'.$final2.'" ></td></tr>
      
             </tbody>
            </table>
    
        
      
        <input id="pdf" type="submit" class="btn btn-lg" value="Exportar a PDF" name="pdf">
          <style>
            #pdf{
            margin-left: 38%; 
            background: rgb(175, 0, 0); 
            color: #fff; margin-bottom: 2%; 
            border: rgb(0, 0, 0);
            }
            #pdf:hover{
            background: rgb(128, 4, 4);
            } 
            #pdf:active{
            transform: translateY(5px);
            } 
          </style>
    </form>
    </section>
          ';
    ?>            
      </body>
      </html>
    
    
    