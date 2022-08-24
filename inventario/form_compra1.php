<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?>
<?php include ('templates/menu.php')?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">

     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  

    <title>Productos</title>
</head>
<body>

         <style>  
            #div{
                margin: 0%;
                display: none;
            }
                .div{
        display: none;

  }
         section {
            background: whitesmoke;
            padding: 1%;
            border-radius: 15px;
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
  }
            #buscar{
            margin-bottom: 5%;
            margin-left: 2.5%;
            margin-top: 0.5%; 
            background: rgb(5, 65, 114); 
            color: #fff; margin-bottom: 2%; 
            border: rgb(5, 65, 114);
            }
            #buscar:hover{
            background: rgb(9, 100, 175);
            } 
            #buscar:active{
            transform: translateY(5px);
            } 
            .a{
                width: 25%;
            }
            @media (max-width: 952px){
   section{
        margin: 5%6%6%3%;
        padding: 2%;
        width: 95%;
    }
    #form{
        margin: -1%6%6%7%;
        padding: 2%;
    }
    h1{
        margin-top: -9%;
    }
    #div{
        margin: 0%;
        display: none;
    }
        .div{
        display: block;

  }

  }
        </style>
        <br><br><br>       
          <font color="white"> <h1 style=" text-align: center;margin-top: 2%">Solicitud de Compra</h1> </font>
<section>
<?php include ('Buscador_ajax/cabezera.php') ?>
     <form style="background: transparent;" method='POST' action="form_compra2.php">
         <button style=" float: right;margin-bottom: 1%;" type="submit" name="solicitar" class=" div btn btn-success btn-sm text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button><br class="div"><br class="div">
         <div id="x">
             <?php 
         if (isset($_POST['Consultar'])) { 
        $columna=$_POST['columna'];
        $tipo=$_POST['tipo'];?>
        <style>
            #x{
                display: none;
            }
        </style>
           <div id="y">    
        <table class="table  table-responsive  table-striped" id="div" style=" width: 100%;">
     
                <thead>
                     <tr id="tr">
                <th style="width: 5%;">Código</th>
                <th style="width: 10%;">Catálogo</th>
                <th style="width: 17%;">Descripción Completa</th>
                <th style="width: 10%;">U/M</th>
                <th style="width: 10%;">Cantidad</th>
                <th style="width: 10%;">Costo Unitario</th>
                <th style="width: 10%;">Fecha Registro</th>
                <th style="width: 10%;" align="center"><button id="div" style=" float: right;margin-bottom: 1%;" type="submit" name="solicitar" class="btn btn-success btn-sm text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button>
                  </th> 
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
        $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos GROUP BY precio, codProductos Order by $columna $tipo";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                $categoria=$productos['categoria'];
                $des=$productos['descripcion'];
                if ($productos['unidad_medida']=="") {
                    $unidad=" Sin Unidad";
                }else{
                   $unidad=$productos['descripcion']; 
                }

                if ($des=="") {
                    $des="DESCRIPTION NO DISPONIBLE";
                }else{
                   $des=$productos['descripcion']; 
                }
                if ($categoria=="") {
                    $categoria="Sin categorias";
                
                }else{
                $categoria=$productos['categoria'];
                }
            
         


        $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");
       $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        echo'
        <tr>
              
            <td style="width:7%;min-width: 100%;" id="th" data-label="Código">'.$productos['codProductos'].'</td>
            <td style="width:7%;min-width: 100%;" id="th" data-label="Código del Catálogo">'.$productos['catalogo'].'</td>
            <td style="width:20%;min-width: 100%;" id="th" data-label="Descripción">'.$productos['descripcion'].'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Unidad de Medida">'.$unidad.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Cantidad">'.$stock.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Precio">'.$precio1.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Fecha">'.$productos['fecha_registro'].'</td>
            <td style="width:11%;min-width: 100%;" id="th" data-label="solicitar">
            ';?>
            <?php 
            if($productos['codProductos']==1) {
                   echo 'Sin Productos';
                }if ($stock!= 0.00) {
                echo'
                 <input   id="'.$productos["cod"] .'" type="checkbox" name="id[]" value="'.$productos["cod"] .'"> <label  id="l" for="'.$productos["cod"] .'" > </label>  
           
         </tr>
        ';
    }
    }

    echo'</tbody></table></div></div>';
            }
        ?>
         </div>
<?php include ('Buscador_ajax/Consulta1.php') ?>
</form>
</section>
</body>
</html>