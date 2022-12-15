<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo ' 
    <script>
        window.location ="../../log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?><?php include ('../../templates/menu1.php') ?>
<?php include ('../../Model/conexion.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buscador al Producto</title>
</head>
<body>
    <style>
        #p{margin-top: -15%;}
        @media screen and (max-width: 800px) {
            #p{margin-top: -8%}
        }
    </style>
  <section  style="background: rgba(255, 255, 255, 0.9);margin: 7%1%1%1%;padding: 1%; border-radius: 15px;">
<h2  class="text-center">Buscador al Producto</h2>
<br>

<style>p{font-size: 12px;</style>
<div class="card">
<div class="card-body">
                <div class="row" >
               <div class="col-md-3" style="position: initial; ">
        <p class="mx-3" style="color: #000; font-weight: bold;">Buscar Codigo del Producto</p>
    </div>          
             <div class="col-md-8"style="position: initial;">
            <section class="well" >
                <form method="POST" action="" class="well hidden"> 
                <div style="position: initial;" class="input-group">
                    Del: <input type="DATE" name="f1" class="form-control mx-3" required>
                    Al: <input type="DATE" name="f2" class="form-control mx-3" required >
           <input required type="number" style="position: initial;" name="Busqueda"  class="form-control"  placeholder="Buscar">
                      <button name="Consultar2" type="submit" onclick="return validar1()" class="input-group-text input" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#search"/>
                </svg>
                 </button>
                 </div> 
             </form>
        </section>
    </div>
</div>         
                </div>  
            </div>
        </div>

<?php
 if (isset($_POST['Consultar2'])) {$f1=$_POST['f1'];$f2=$_POST['f2'];$Busqueda=$_POST['Busqueda'];
 $final = "0.00";
 $final1 = "0.00";
 $final2 = "0.00";
 $final3 = "0.00";
 $final4 = "0.00";
 $final5 = "0.00";
 $final6 = "0.00";
 $final7 = "0.00";

 ?>
<br>

<div class="row" >

        <div class="col-md-9">
      

         <div class="card">
            <div class="card-body">
                         <table class="table" id="examp" style="">
                   <thead>
             <tr id="tr">
                     <th style="width:20%"  id="th">Fecha</th>
                     <th style="width:30%"  id="th">Concepto</th>
                     <th style="width:30%;" id="th">No. Comprobante</th>
                     <th style="width:20%"  id="th">Entradas</th>
                     <th style="width:20%"  id="th">Salidas</th>
                     <th style="width:20%"  id="th">Saldo</th>
                
            </tr>
           
     </thead>
     <div>
<tbody>
    <?php $sql = "SELECT descripcion,Concepto,unidad_medida,fecha_registro,No_Comprovante,SUM(Entradas),SUM(Salidas),Saldo,Mes,Año FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda' GROUP BY fecha_registro,No_Comprovante,Concepto";
$result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $fecha=date("d-m-Y",strtotime($f1));
        $fecha3=date("d-m-Y",strtotime($f2));
        $Concepto=$productos['Concepto'];
        $Comprovante= $productos['No_Comprovante'];
        $precio= $productos['Saldo'];
      $precio1=number_format($precio, 2, ".",",");
        $descripcion=$productos['descripcion'];
        $stock=$productos['SUM(Entradas)'];
        $Salida=$productos['SUM(Salidas)'];
      $stock1=number_format($stock, 2, ".",",");  
      $um=$productos['unidad_medida']; 

        $final += $stock;
        $final1   =    number_format($final, 2, ".",",");

        $final6 += $precio;
        $final7   =    number_format($final6, 2, ".",",");
        
        ?>
        <tr>
            <td id="th" data-label="Fecha"><?php echo $fecha ?></td>
            <td id="th" data-label="Concepto"><?php echo $Concepto ?></td>
            <td id="th" data-label="No. Comprovante"><?php echo $Comprovante ?></td>
            <td id="th" data-label="Entradas"><?php echo $stock1?></td>
            <td id="th" data-label="Salidas"><?php echo $Salida ?></td>
            <td id="th" data-label="Saldo"><?php echo $precio1 ?></td>
        </tr> 
       <?php } ?>

           </tbody>
        </table>
        
            </div>
        </div>
        </div>
            <div class="col-md-3" id="card">
                  <div class="card mb-2">
            <div class="card-body">
                  <p align="right"><b style="float: left;">Entradas: </b><?php echo $final1 ?></p>
                  <p align="right"><b style="float: left;">Salidas: </b><?php echo $final3 ?></p>

                  <p align="right"><b style="float: left;">Resta de Entradas - Salidas: </b><?php echo $final5 ?></p>
                  <p align="right"><b style="float: left;">Total del Saldo: </b><?php echo $final7 ?></p>
        </div>
    </div>
        <div class="card">
            <div class="card-body">

<style type="text/css">#card{display: block;}.card1, #card2{display: none;}</style>
                 <div  style="position: initial;" class="btn-group mb-3 my-3  mx-2" role="group" aria-label="Basic outlined example">
         <form method="POST" action="../../Plugin/Imprimir/Producto/productos.php" target="_blank">

         <input type="hidden" name="Busqueda" value="<?php echo $Busqueda ?>">

             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Historial">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/PDF/Productos/pdf_productos.php" target="_blank" class="mx-1">

             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Historial" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
                 <form  method="POST" action="../../Plugin/Excel/Productos/Historial.php" >

                <button type="submit" class="btn btn-outline-primary" name="Historial" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
</div>

<p><b >PERIODO DE MOVIMIENTO</b></p>

<p align="right"><b style="float: left;">DE:</b> <?php echo $fecha ?></p>     
<p align="right"><b style="float: left;">AL:</b> <?php echo $fecha3 ?></p>     

   
<p align="right"><b style="float: left;">Codigo del Producto: </b><?php echo $Comprovante?></p>     

<p align="right"><b style="float: left;">Descripción: </b><?php echo $descripcion ?></p>     

<p align="right"><b style="float: left;">Unidad de Medida</b><?php echo $um ?></p> 


<?php } ?>

</div>
        </div>
            </div>
        </div>
  </section>

        <script type="text/javascript">

            $(document).ready(function () {

       $('#examp').DataTable({

            responsive: true,
            autoWidth:false,
            deferRender: true,
            scroller: true,
            lengthMenu: [[10, -1], [10,"Todos"]],
           
            "searching": false,
            scrollCollapse: true,
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

    });
}); 
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Eliminar este registro?")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
let linkDelete =document.querySelectorAll("delete");
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("p").innerHTML = day + "-" + month + "-" + year;
document.getElementById("p1").value = day + "-" + month + "-" + year;
document.getElementById("p2").value = day + "-" + month + "-" + year;
document.getElementById("p3").value = day + "-" + month + "-" + year;
</script>
</section>
</body>
</html>